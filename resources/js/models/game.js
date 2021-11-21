import ApiClient from '../api-client';

export default class Game {

    constructor(user, computer) {
        this.user = user;
        this.computer = computer;
    }

    static VALID_CARDS = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'];

    user;
    computer;

    static getRandomCard() {
        const randomIndex = Math.floor( Math.random() *  Game.VALID_CARDS.length );
        
        return Game.VALID_CARDS[randomIndex];
    }

    play() {
        this.user.hand.forEach((card, index) => {
            const userCardValue = Game.VALID_CARDS.indexOf(card)
            const computerCardValue = Game.VALID_CARDS.indexOf( this.computer.hand[index] );

            if ( userCardValue === computerCardValue) {
                return;
            }

            if (userCardValue > computerCardValue) {
                this.user.score++;
            } else {
                this.computer.score++;
            }
        });
    }

    save() {
        return ApiClient.saveGame({
            user: this.user,
            computer: this.computer,
        });
    }

    reset() {
        this.user.reset();
        this.computer.reset();
    }
}
