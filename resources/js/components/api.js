import axios from "axios";

const instance = axios.create();

instance.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
instance.defaults.headers['Accept'] = "application/json";
instance.defaults.headers['Content-Type'] = "application/json";

export default instance

export function gerAllUsers(){
    return instance.get('api/leaderboard/users').then(res => res.data);

}
