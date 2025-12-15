<script setup>
import {ref,onMounted } from 'vue';
const geschenke = ref([]);
onMounted(() => {
    fetch("http://localhost/assets/test_json.php")
            .then(res => res.json())
            .then(data =>{
            geschenke.value = data;

    })
    .catch(error => console.error("Fehler:",error));
});
    
        
</script> 
<template>
    <div v-for="artikel in geschenke" :key="artikel.ProduktID">
        Artikel-ID: {{ artikel.roduktid }}
    </div>
     <p v-if="geschenke.length === 0">Lade Daten...</p>
</template>
<style scoped></style>