import * as Klaro from 'klaro/dist/klaro-no-css';
import {addTranslationsToServices, except, makeTranslations} from './helpers';

Klaro.setup({
    ...except(window.kapouet.klaro.config, ['services']),
    ...{
        translations: makeTranslations(
            window.kapouet.klaro.lang,
            except(window.kapouet.klaro.translations, ['services'])
        )
    },
    ...{
        services: addTranslationsToServices(
            window.kapouet.klaro.config.services,
            window.kapouet.klaro.lang,
            window.kapouet.klaro.translations.services || {}
        )
    }
});
