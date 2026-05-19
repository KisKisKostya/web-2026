////////////////////////////////////////      1      //////////////////////////////////////////////////////

const isPrimeNumber = (data) => {
    // Функция проверки простого числа
    const isPrime = (n) => {
        if (n < 2) return false;
        for (let i = 2; i < n; i++) {
            if (n % i === 0) return false;
        }
        return true;
    };

    // Если число
    if (typeof data === 'number') {
        console.log(`${data} ${isPrime(data) ? 'простое число' : 'не простое число'}`);
        return;
    }

    // Если массив
    if (Array.isArray(data)) {
        const { primes, nonPrimes } = data.reduce(
            (acc, num) => {
                if (typeof num !== 'number') {
                    console.log('Ошибка: элемент массива не число');
                    return acc;
                }
                if (isPrime(num)) acc.primes.push(num);
                else acc.nonPrimes.push(num);
                return acc;
            },
            { primes: [], nonPrimes: [] }
        );

        if (primes.length === 0 && nonPrimes.length === 0) return;

        const result = [
            primes.length && `${primes.join(', ')} ${primes.length === 1 ? 'простое число' : 'простые числа'}`,
            nonPrimes.length && `${nonPrimes.join(', ')} ${nonPrimes.length === 1 ? 'не простое число' : 'не простые числа'}`
        ].filter(Boolean).join(', ');
        
        console.log(result);
        return;
    }
    
    // Если ни число, ни массив
    console.log('Ошибка: параметр должен быть числом или массивом');
};

isPrimeNumber(3);
isPrimeNumber(4); 
isPrimeNumber([3, 4, 5]); 
isPrimeNumber([2, 3, 5]);      
isPrimeNumber([4, 6, 8, 1, 7, 8, 7]);     

////////////////////////////////////////      2      //////////////////////////////////////////////////////

const countVowels = (str) => {
    const vowels = new Set(['а', 'е', 'ё', 'и', 'о', 'у', 'ы', 'э', 'ю', 'я']);
    return str.toLowerCase().split('').filter(char => vowels.has(char)).length;
};

console.log(countVowels("Привееееееет, мир!")); 

////////////////////////////////////////      3      //////////////////////////////////////////////////////

const uniqueElements = (arr) => {
    const result = {};
    
    arr.forEach(item => {
        const key = String(item);
        result[key] = (result[key] || 0) + 1;
    });
    
    return result;
};

console.log(uniqueElements(['привет', 'hello', 'G', 'G', 1, '1']));

////////////////////////////////////////      4      //////////////////////////////////////////////////////

const mergeObjects = (obj1, obj2) => ({ ...obj1, ...obj2 });

console.log(mergeObjects({ a: 1, b: 2 }, { b: 3, c: 4 }));

////////////////////////////////////////      5      //////////////////////////////////////////////////////

const users = [
    { id: 1, name: "Alice" },
    { id: 2, name: "Bob" },
    { id: 3, name: "Charlie" }
];

const names = users.map(({ name }) => name);

const names = users.map((user) => {
    return user.name;
});

const names = users.map(user => user.name);

console.log(names);

////////////////////////////////////////      6      //////////////////////////////////////////////////////

const mapObject = (obj, callback) => 
    Object.fromEntries(
        Object.entries(obj).map(([key, value]) => [key, callback(value)])
    );

// Пример использования
const nums = { a: 1, b: 2, c: 3 };
console.log(mapObject(nums, x => x * 2)); // { a: 2, b: 4, c: 6 }

////////////////////////////////////////      7      //////////////////////////////////////////////////////

const generatePassword = (length) => {
    if (length < 4) return "Ошибка: минимум 4 символа";

    const lower = "abcdefghijklmnopqrstuvwxyz";
    const upper = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    const digits = "0123456789";
    const special = "!@#$%^&*";

    const getRandomChar = (str) => str[Math.floor(Math.random() * str.length)];
    
    // Берём по одному символу из каждой группы
    let password = [lower, upper, digits, special].map(getRandomChar).join('');
    
    // Все символы вместе
    const all = lower + upper + digits + special;
    
    // Добавляем остальные случайные символы
    while (password.length < length) {
        password += getRandomChar(all);
    }
    
    // Перемешиваем строку
    return password.split('').sort(() => Math.random() - 0.5).join('');
};

console.log(generatePassword(8));

////////////////////////////////////////      8      //////////////////////////////////////////////////////

const numbers = [2, 5, 8, 10, 3];

const resultChain = numbers
    .map(num => num * 3)
    .filter(num => num > 10);

console.log(resultChain);