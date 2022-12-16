<?php

get_header();
?>

<template>
    <article>
        <img src="" alt="">
        
            <h2></h2>
        
    </article>
</template>

<section id="primary" class="content-area">
<main id="main" class="site-main">
<nav id="filtrering">
    <button data-work="alle">Alle</button>
</nav>
<section class="workcontainer"></section>
</main>
<script>
let works;
let categories;
let filterWork = "alle";

const dbUrl="https://mariusdesign.dk/kea/10_eksamensprojekt/amandakessaris/wp-json/wp/v2/work?per_page=100";
const catUrl="https://mariusdesign.dk/kea/10_eksamensprojekt/amandakessaris/wp-json/wp/v2/categories";

async function getJson(){
        const data = await fetch(dbUrl);
        const catdata = await fetch(catUrl);
        works = await data.json();
        categories = await catdata.json();
console.log(works);
visWorks();
opretKnapper();
    }
function opretKnapper(){
    categories.forEach(cat=>{
    document.querySelector("#filtrering").innerHTML += `<button class="filter" data-work="${cat.id}">${cat.name}</button>`
    })

    addEventListenerToButtons();

}

function addEventListenerToButtons(){
    document.querySelectorAll("#filtrering button").forEach(elm =>{
        elm.addEventListener("click", filtrering);
    })
};

function filtrering(){
filterWork = this.dataset.work;
console.log(filterWork);

visWorks();
}
    
function visWorks(){
        let temp = document.querySelector("template");
let container = document.querySelector(".workcontainer")
container.innerHTML = "";
works.forEach(work=>{
    if (filterWork=="alle" || work.categories.includes(parseInt(filterWork))){
            let klon = temp.cloneNode(true).content;
            klon.querySelector("img").src = work.billede.guid;
            klon.querySelector("h2").textContent = work.title.rendered;
            klon.querySelector("article").addEventListener("click", ()=>{location.href=work.link;})
            container.appendChild(klon);
        }
        })
    }

    getJson();
</script>

</section>


<?php
get_footer();