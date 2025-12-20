import {ref} from 'vue';

const geschenke = ref([]);

export function useGeschenke() {
    const load = async () => {
        const res = await fetch('api/ewa/g13/P1/api/test_json.php');
        geschenke.value = await res.json();
    }

    return {
        geschenke,
        load
    }
}