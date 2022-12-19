<article>
<a href="https://mariusdesign.dk/kea/10_eksamensprojekt/amandakessaris/amanda-kessaris-works/" >
<button id="clickhere">Click Here To Come Back To WORKS</button>    
</a>

    <img class="pic" src="" alt="">

    <div>
        <h2></h2>
    </div>

<article>
</main>

<footer>
<p class="fotter">
© Copyright AMANDA KESSARIS 2022
</p>
</footer>

<script>
    let work;

    const dbUrl="https://mariusdesign.dk/kea/10_eksamensprojekt/amandakessaris/wp-json/wp/v2/work/"+<?php echo get_the_ID()?>;
    
    async function getJson (){
        const data = await fetch(dbUrl);
        work = await data.json();
        visWorks();
    }

    function visWorks() {
        console.log(work.billede.guid);
        document.querySelector(".pic").src = work.billede.guid;
        document.querySelector("h2").textContent = work.beskrivelse;
    }

    getJson();

    </script>

<style>

#clickhere{
    display: block;
    margin-left: auto;
    margin-right: auto;
}

.pic {
  max-width: 25rem;
  display: block;
  margin-left: auto;
  margin-right: auto;
  padding: 1rem 0rem 1rem 0rem;
  
}

h2 {
  font-size: 2rem;
  text-align: center;
  margin: 0rem 0rem 2rem 0rem;

}

.fotter{
   position: fixed;
   bottom: 0rem;
   left: 0rem;
   right: 0rem;
   margin-bottom: 0rem;
   text-align: center;
   font-size: 0.75rem;
   font-weight: 300; 
}

@media (max-width: 782px){
.pic {
max-width: 100%;
padding-left: 1rem;
padding-right: 1rem;
}
}

</style>

</section>
<?php
