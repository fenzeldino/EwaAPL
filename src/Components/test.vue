<script setup>
import {ref,onMounted } from 'vue';
const geschenke = ref([]);
onMounted(() => {
    fetch("api/ewa/g13/P1/api/test_json.php")
            .then(res => res.json())
            .then(data =>{
            geschenke.value = data;

    })
    .catch(error => console.error("Fehler:",error));
});
    
        
</script> 
<template>
    <div v-if="geschenke.length === 0" class="loading">
           Lade Produkte...
       </div>
       <section class="gift-shop">
    
        <div clas="prdouct-card" v-for="geschenk in geschenke" :key="geschenk.ID">
            <div class="img-wrapper">
            <img :src="geschenk.LinkGrafikdatei"></img>
            </div>
            <p class="price">{{ geschenk.PreisBrutto }}€</p>
        </div>
    </section>
</template>
<style scoped>
    p{
        padding-left: 10px;
    }
.gift-shop {
display: grid;
grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
gap: 1.5rem;
}


.product-card {
background: #fff;
border-radius: 1rem;
padding: 1rem;
box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
transition: transform 0.3s ease, box-shadow 0.3s ease;
}


.product-card:hover {
transform: translateY(-4px);
box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
}


.img-wrapper {
position: relative;
width: 100%;
aspect-ratio: 1 / 1;
overflow: hidden;
border-radius: 0.75rem;
}


.img-wrapper img {
width: 100%;
height: 100%;
object-fit: cover; /* wichtig für Shop-Bilder */
transition: transform 0.4s ease;
}


.product-card:hover img {
transform: scale(1.08);
}


h3 {
margin: 0.75rem 0 0.25rem;
font-size: 1.05rem;
}


.price {
font-weight: 600;
color: #2b7a78;
}
</style>