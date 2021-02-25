export function except(object, keys) {
    return Object
        .keys(object)
        .filter((key) => ! keys.includes(key))
        .reduce((result, key) => {
            result[key] = object[key];

            return result;
        }, {});
}

export function addTranslationsToServices(services, lang, translations) {
    return services.map((service) => {
        if (translations[service.name]) {
            service.translations = service.translations || {};
            service.translations[lang] = translations[service.name];
        }

        return service;
    });
}

export function makeTranslations(lang, translations) {
    const result = {};
    result[lang] = translations;

    return result;
}
