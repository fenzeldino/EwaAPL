import {ref} from 'vue';

const geschenke = ref([]);

export function useGeschenke() {
    const load = async () => {
        const res = await fetch('http://localhost/EwaAPL/src/assets/test_json.php');
        geschenke.value = await res.json();
    }

    return {
        geschenke,
        load
    }
}