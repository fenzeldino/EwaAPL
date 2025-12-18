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
    <div class="suchleiste">    
        <input type="text" v-model="suchBegriff"placeholder="Suche..."/>
        <ul>
            <li v-for="item in geschenke" :key="item.ProduktID">{{ item.Produkttitel }}</li>
        </ul>
        <button @click="onSearch" aria-label="Suchen">
🔍
</button>
    </div>
</template>
<style scoped>
    .suchleiste {
display: flex;
align-items: center;

width: 90%;
background: #fff;
border-radius: 999px;
padding: 0.35rem;
box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
transition: box-shadow 0.3s ease, transform 0.2s ease;
}


.suchleiste:focus-within {
box-shadow: 0 12px 28px rgba(0, 0, 0, 0.15);
transform: translateY(-1px);
}


.suchleiste input {
flex: 1;
border: none;
outline: none;
padding: 0.6rem 1rem;
font-size: 1rem;
border-radius: 999px;
}


.suchleiste input::placeholder {
color: #aaa;
}


.suchleiste button {
border: none;
background: linear-gradient(135deg, #2b7a78, #3aafa9);
color: #fff;
width: 42px;
height: 42px;
border-radius: 50%;
cursor: pointer;
font-size: 1.1rem;
display: flex;
align-items: center;
justify-content: center;
transition: transform 0.2s ease, box-shadow 0.2s ease;
}


.suchleiste button:hover {
transform: scale(1.08);
box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
}


.suchleiste button:active {
transform: scale(0.95);
}
li{
    list-style: none;
}
</style>