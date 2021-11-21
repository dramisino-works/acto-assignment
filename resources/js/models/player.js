export default class Player {

    name = '';
    hand = [];
    score = 0;

    addCard(card) {
        this.hand.push(card);
    }

    reset() {
        this.hand = [];
        this.score = 0;
    }
}