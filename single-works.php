<?php

get_header();
?>

<section id="primary" class="content-area">
<main id="main" class="site-main">

<article>
    <img class="pic" src="" alt="">
    <div>
        <p>
</div>
<article>
</main>
<script>
    let work;

    const dbUrl="https://mariusdesign.dk/kea/10_eksamensprojekt/amandakessaris/wp-json/wp/v2/work/"+<?php echo get_the_ID?>";
    
    async function getJson (){
        const data = await fetch(dbUrl);
        work = await data.json();
        visWorks();
    }

    function visWorks() {
        console.log(work.billede.guid);
        document.querySelector(".pic").src = work.guid;
        document.querySelector("p").textContent = work.beskrivelse;
    }

    getJson();
    </script>

</section>


<?php
get_footer();