<?php

get_header();
?>

<template>
    <article>
    <div class="content">
    <img class="pic" src="" alt="">
    <h4></h4>
    </div>
    </article>
</template>

<section id="primary" class="content-area">
<main id="main" class="site-main">
  <h2>Amanda Kessaris Works</h2>
  <p>Amanda is a young artist who, through her art, tackles topics such as feminism, equality and gender stereotypes. Her works explore the challenges and barriers that women still face in our society and show a strong will to create change and equality. Through the use of a variety of media, from drawing to installations, Amanda manages to create a unique and engaging visual dialogue that reaches out to both women and men. She is an artist who stands by her message and invites us all to think about how we can contribute to creating a more equal world.</p>
<nav id="filtrering">
    <button data-work="alle">ALL</button>
</nav>
<section class="workcontainer"></section>
</main>
<script>

const btn = document.getElementById('btn');



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
            klon.querySelector("h4").textContent = work.title.rendered;
            klon.querySelector("article").addEventListener("click", ()=>{location.href=work.link;})
            container.appendChild(klon);
        }
        })
    }

    getJson();
</script>

<style>

.workcontainer {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.content {
  max-width: 15rem;
  padding: 0.75rem;
  text-align: center;
}

#filtrering {
  display: flex;
  justify-content: center;
}

button {
  background-color: white;
  border: solid 1px black;
  color: black;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  text-decoration: none;
  cursor: pointer;
  border-radius: 10px;
}

button:hover {
  background-color: rgb(232, 232, 232);
  color: black;
}

.elementor-button:active {
    background-color: rgb(232, 232, 232);
}

.filtrering:active {
    background-color: rgb(232, 232, 232);
}


button:active {
    background-color: rgb(232, 232, 232);
}


@media (max-width: 782px){

#filtrering {
  display: flex;
    flex-direction: column;
}

.content {
max-width: 100%;
margin: 1rem 0rem 0rem 0rem;
text-align: center;
}
}


</style>

</section>


<?php
get_footer();