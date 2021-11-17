import axios from "axios";

const instance = axios.create();
const token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5NGUyY2NhMy03ZWI1LTQ0MzYtOWNiNS05YjMxMmVkNGY3OGEiLCJqdGkiOiJjNGRhNTk3NTk3NGU5N2M0NmI2NWRhYzE2ZTEzODY3ZGVhMWVhOGFkMjQwNmRjMjlhNjBjNDA4Yjc0NWFmZjY1MjI4ZTlmZDFmYjAzZjk3MiIsImlhdCI6MTYzNzE5MjMxNy40MTkxMTMsIm5iZiI6MTYzNzE5MjMxNy40MTkxMTgsImV4cCI6MTY2ODcyODMxNy40MTMwNjgsInN1YiI6IjExIiwic2NvcGVzIjpbXX0.om5tYgq05Hh1_3RVwnvsechq4u3Xoc9DUxkjw_C5OMjbsknwfI0neHU5jTLR5968el5hb6kIE75M-ggmjKF-aVYU86q8usV5xA6-d_UdaRfcHnx_zlpbRcuMk7MN5R3VRyb0aDGQtbcAXvzPtJBuNU5pQHxce2vEspSo2LH3E7MYbMFbbr0zy5gbWznsDUb6nJYqf_MiKs3u8FD7YL4H0cHmSvV8e1dZRdQFBYUVARmcs8N19KDpphFehcpN6Q2bXwHJvPkoKTHqyH3AAM5VX4A81Kc1G8rmfDEcBFk0Nsk2HtBdNgoaDfR9VJrW65AzKLt9Nxwp2mOKBeYuztq3BCFimf7kqZiRnCNcGGDjXv2YXDa_NULSzgCOWfzcdUinRJrjqhs-cm9CC6Ee73AfVCIVbV7fN-OLqSQHSYgbhJEaG9jwO93Dyh1pGNkesw7WIpp9f5Kbda-FU_0f8U_UsqZy_xINWp3ihH68YvQjUlbSB3z_XTjEO1PexdUsa4qy20U8FFvoU7nrDPeA1ure9JftRZiLCt9uDrKJ8_71ny-GjbnZ5ysh_1-Qb_01FtTUrupXFlrRGeU3txuArdWf37_KCktq1B1b1pPVT6FwSMuFUq3JKob2ejmLOAHLdekOnqyPhdEomAU3B0cmML0eGCGTNiDHOzPBxhbmZwAUffY";
instance.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
instance.defaults.headers['Content-Type'] = "application/json";
instance.defaults.headers['Authorization'] = "Bearer " + token;
export function getAllUsers(){
    return instance.get('api/leaderboard/users').then(res => res.data);
}

export function deleteUser(id){
    return instance.delete('api/leaderboard/user/'+id).then(res => res.data);
}

export function updateUserPoint(id, point){
    return instance.post('api/leaderboard/user/'+id, {
        point: point
    }).then(res => res.data);
}

export function createNewUser(info){
    return instance.post('api/leaderboard/user', {
        name: info.name,
        age: info.age,
        address: info.address,
    }).then(res => res.data);
}
