<article>
    <img class="pic" src="" alt="">
    <div>

<h1>test</h1>
        <h2>
</div>
<article>
</main>
<script>
    let work;

    const dbUrl="https://mariusdesign.dk/kea/10_eksamensprojekt/amandakessaris/wp-json/wp/v2/work/"+<?php echo get_the_ID()?>";
    

    async function getJson (){
        const data = await fetch(dbUrl);
        work = await data.json();
        visWorks();
    }

    function visWorks() {
        console.log(work.billede.guid);
        document.querySelector(".pic").src = work.guid;
        document.querySelector("h2").textContent = work.beskrivelse;
    }

    getJson();
    </script>

</section>


<?php
