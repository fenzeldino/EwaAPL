<script setup>
import {ref,onMounted } from 'vue';
const geschenke = ref([]);
onMounted(() => {
    fetch("api/ewa/g13/aplbeleg/Weihnachtsgeschenke-Shop/src/assets/test_json.php")
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
   <figure>
        <img src="/photos/download.jpeg"></img>
        <figcaption>Bildinformationen</figcaption>
   </figure>
   
</template>
<style scoped>
    p{
        padding-left: 10px;
    }
</style>