import counterUp from 'counterup2';

class Counter {
    constructor() {
        this.items = document.querySelectorAll('.counter');
        this.createCounter();
    }

    createCounter() {
        this.items.forEach((item) => {
            counterUp(item, {
                duration: 1000,
                delay: 16
            });
        });
    }
}

export default Counter;