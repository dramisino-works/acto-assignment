import axios from 'axios';

export default class ApiClient {

    static API_URL = 'http://localhost:81/api';

    static saveGame(data) {
        return axios.post(`${ApiClient.API_URL}/games`, data);
    }

    static getLeaderboard() {
        return axios.get(`${ApiClient.API_URL}/leaderboard`);
    }
}
