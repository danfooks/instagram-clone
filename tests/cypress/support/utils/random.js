import { faker } from '@faker-js/faker';

export class Random {
    getFirstName() {
        return faker.name.firstName();
    }

    getLastName() {
        return faker.name.lastName();
    }

    getFullName() {
        return `${this.getFirstName()} ${this.getLastName()}`;
    }

    getSentence(numWords = 10) {
        return faker.lorem.sentence(numWords);
    }

    getEmail() {
        return faker.internet.email().toLowerCase();
    }

    getUsername() {{
        return faker.internet.userName();
    }}

    getPassword() {
        return faker.internet.password();
    }
}

export const random = new Random();