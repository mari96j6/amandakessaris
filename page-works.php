<?php

get_header();
?>

<template>
    <article>
        <img src="" alt="">
        <div>
            <p></p>
        </div>
    </article>
</template>

<section id="primary" class="content-area">
<main id="main" class="site-main">

<section class="workcontainer"></section>
</section>
</main>
<script>
let works;

const dbUrl="https://mariusdesign.dk/kea/10_eksamensprojekt/amandakessaris/wp-json/wp/v2/work?per_page=100";

async function getJson(){
        const data = await fetch(dbUrl);
        works = await data.json();
console.log(works);
visWorks();
    }

    function visWorks(){
        let temp = document.querySelector("template");
let container = document.querySelector(".workscontainer")
works.forEach(work=>{
let klon = temp.cloneNode(true).content;
            klon.querySelector("h2").textcontent = work.title.rendered;
klon.querySelector("img").src = work.billede.guid;
klon.querySelector("article").addEventListener("click", ()=>{location.href="restdb-single.html?id="+work._id})
        

            container.appendChild(klon);

        })
    }

    
</script>
</section>


<?php
get_footer();






