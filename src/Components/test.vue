<script setup>
import {ref,onMounted } from 'vue';
const geschenke = ref([]);
onMounted(() => {
    fetch("api/ewa/demos/php_dbtab_to_json/export_json.php")
            .then(res => res.json())
            .then(data =>{
            geschenke.value = data;

    })
    .catch(error => console.error("Fehler:",error));
});
    
        
</script> 
<template>
    <div v-for="artikel in geschenke" :key="artikel.ProduktID">
        Artikel-ID: {{ artikel.ProduktID}}
    </div>
     <p v-if="geschenke.length === 0">Lade Daten...</p>
</template>
<style scoped></style>