import flatpickr from "flatpickr";
import { Japanese } from "flatpickr/dist/l10n/ja.js";

flatpickr("#js-datepicker", {
    plugins: [],
    dateFormat: "Y/m/d",
    locale: Japanese
});
