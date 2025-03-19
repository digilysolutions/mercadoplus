<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            ["country" => "Albania", "currency" => "Leke", "code" => "ALL", "symbol" => "Lek", "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true],
            [
                "country" => "America", "currency" => "Dollars", "code" => "USD", "symbol" => '$',
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Afghanistan", "currency" => "Afghanis", "code" => "AF", "symbol" => "؋",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Argentina", "currency" => "Pesos", "code" => "ARS", "symbol" => '$',
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Aruba", "currency" => "Guilders", "code" => "AWG", "symbol" => "ƒ",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Australia", "currency" => "Dollars", "code" => "AUD", "symbol" => '$',
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Azerbaijan", "currency" => "New Manats", "code" => "AZ", "symbol" => "ман",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Bahamas", "currency" => "Dollars", "code" => "BSD", "symbol" => '$',
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Barbados", "currency" => "Dollars", "code" => "BBD", "symbol" => '$',
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Belarus", "currency" => "Rubles", "code" => "BYR", "symbol" => "p.",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Belgium", "currency" => "Euro", "code" => "EUR", "symbol" => "€",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Beliz", "currency" => "Dollars", "code" => "BZD", "symbol" => "BZ$",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Bermuda", "currency" => "Dollars", "code" => "BMD", "symbol" => '$',
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Bolivia", "currency" => "Bolivianos", "code" => "BOB", "symbol" => '$b',
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Bosnia and Herzegovina", "currency" => "Convertible Marka", "code" => "BAM", "symbol" => "KM",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Botswana", "currency" => "Pula's", "code" => "BWP", "symbol" => "P",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Bulgaria", "currency" => "Leva", "code" => "BG", "symbol" => "лв",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Brazil", "currency" => "Reais", "code" => "BRL", "symbol" => "R$",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Britain [United Kingdom]", "currency" => "Pounds", "code" => "GBP", "symbol" => "£",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Brunei Darussalam", "currency" => "Dollars", "code" => "BND", "symbol" => '$',
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Cambodia", "currency" => "Riels", "code" => "KHR", "symbol" => "៛",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Canada", "currency" => "Dollars", "code" => "CAD", "symbol" => '$',
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Cayman Islands", "currency" => "Dollars", "code" => "KYD", "symbol" => '$',
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Chile", "currency" => "Pesos", "code" => "CLP", "symbol" => '$',
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "China", "currency" => "Yuan Renminbi", "code" => "CNY", "symbol" => "¥",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Colombia", "currency" => "Pesos", "code" => "COP", "symbol" => '$',
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Costa Rica", "currency" => "Colón", "code" => "CRC", "symbol" => "₡",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Croatia", "currency" => "Kuna", "code" => "HRK", "symbol" => "kn",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Cuba", "currency" => "Pesos", "code" => "MN", "symbol" => "$",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
             [
                "country" => "Cuba", "currency" => "Moneda Libremente Convertible", "code" => "MLC", "symbol" => "$",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Cyprus", "currency" => "Euro", "code" => "EUR", "symbol" => "€",
                "thousand_separator" => ".", "decimal_separator" => ",", 'is_activated' => true
            ],
            [
                "country" => "Czech Republic", "currency" => "Koruny", "code" => "CZK", "symbol" => "Kč",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Denmark", "currency" => "Kroner", "code" => "DKK", "symbol" => "kr",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Dominican Republic", "currency" => "Pesos", "code" => "DOP ", "symbol" => "RD$",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "East Caribbean", "currency" => "Dollars", "code" => "XCD", "symbol" => '$',
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Egypt", "currency" => "Pounds", "code" => "EGP", "symbol" => "£",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "El Salvador", "currency" => "Colones", "code" => "SVC", "symbol" => '$',
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "England [United Kingdom]", "currency" => "Pounds", "code" => "GBP", "symbol" => "£",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Euro", "currency" => "Euro", "code" => "EUR", "symbol" => "€",
                "thousand_separator" => ".", "decimal_separator" => ",", 'is_activated' => true
            ],
            [
                "country" => "Falkland Islands", "currency" => "Pounds", "code" => "FKP", "symbol" => "£",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Fiji", "currency" => "Dollars", "code" => "FJD", "symbol" => '$',
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "France", "currency" => "Euro", "code" => "EUR", "symbol" => "€",
                "thousand_separator" => ".", "decimal_separator" => ",", 'is_activated' => true
            ],
            [
                "country" => "Ghana", "currency" => "Cedis", "code" => "GHS", "symbol" => "¢",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Gibraltar", "currency" => "Pounds", "code" => "GIP", "symbol" => "£",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Greece", "currency" => "Euro", "code" => "EUR", "symbol" => "€",
                "thousand_separator" => ".", "decimal_separator" => ",", 'is_activated' => true
            ],
            [
                "country" => "Guatemala", "currency" => "Quetzales", "code" => "GTQ", "symbol" => "Q",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Guernsey", "currency" => "Pounds", "code" => "GGP", "symbol" => "£",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Guyana", "currency" => "Dollars", "code" => "GYD", "symbol" => '$',
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Holland [Netherlands]", "currency" => "Euro", "code" => "EUR", "symbol" => "€",
                "thousand_separator" => ".", "decimal_separator" => ",", 'is_activated' => true
            ],
            [
                "country" => "Honduras", "currency" => "Lempiras", "code" => "HNL", "symbol" => "L",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Hong Kong", "currency" => "Dollars", "code" => "HKD", "symbol" => '$',
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Hungary", "currency" => "Forint", "code" => "HUF", "symbol" => "Ft",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Iceland", "currency" => "Kronur", "code" => "ISK", "symbol" => "kr",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "India", "currency" => "Rupees", "code" => "INR", "symbol" => "₹",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Indonesia", "currency" => "Rupiahs", "code" => "IDR", "symbol" => "Rp",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Iran", "currency" => "Rials", "code" => "IRR", "symbol" => "﷼",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Ireland", "currency" => "Euro", "code" => "EUR", "symbol" => "€",
                "thousand_separator" => ".", "decimal_separator" => ",", 'is_activated' => true
            ],
            [
                "country" => "Isle of Man", "currency" => "Pounds", "code" => "IMP", "symbol" => "£",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Israel", "currency" => "New Shekels", "code" => "ILS", "symbol" => "₪",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Italy", "currency" => "Euro", "code" => "EUR", "symbol" => "€",
                "thousand_separator" => ".", "decimal_separator" => ",", 'is_activated' => true
            ],
            [
                "country" => "Jamaica", "currency" => "Dollars", "code" => "JMD", "symbol" => "J$",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Japan", "currency" => "Yen", "code" => "JPY", "symbol" => "¥",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Jersey", "currency" => "Pounds", "code" => "JEP", "symbol" => "£",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Kazakhstan", "currency" => "Tenge", "code" => "KZT", "symbol" => "лв",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Korea [North]", "currency" => "Won", "code" => "KPW", "symbol" => "₩",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Korea [South]", "currency" => "Won", "code" => "KRW", "symbol" => "₩",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Kyrgyzstan", "currency" => "Soms", "code" => "KGS", "symbol" => "лв",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Laos", "currency" => "Kips", "code" => "LAK", "symbol" => "₭",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Latvia", "currency" => "Lati", "code" => "LVL", "symbol" => "Ls",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Lebanon", "currency" => "Pounds", "code" => "LBP", "symbol" => "£",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Liberia", "currency" => "Dollars", "code" => "LRD", "symbol" => '$',
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Liechtenstein", "currency" => "Switzerland Francs", "code" => "CHF", "symbol" => "CHF",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Lithuania", "currency" => "Litai", "code" => "LTL", "symbol" => "Lt",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Luxembourg", "currency" => "Euro", "code" => "EUR", "symbol" => "€",
                "thousand_separator" => ".", "decimal_separator" => ",", 'is_activated' => true
            ],
            [
                "country" => "Macedonia", "currency" => "Denars", "code" => "MKD", "symbol" => "ден",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Malaysia", "currency" => "Ringgits", "code" => "MYR", "symbol" => "RM",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Malta", "currency" => "Euro", "code" => "EUR", "symbol" => "€",
                "thousand_separator" => ".", "decimal_separator" => ",", 'is_activated' => true
            ],
            [
                "country" => "Mauritius", "currency" => "Rupees", "code" => "MUR", "symbol" => "₨",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Mexico", "currency" => "Pesos", "code" => "MXN", "symbol" => '$',
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Mongolia", "currency" => "Tugriks", "code" => "MNT", "symbol" => "₮",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Mozambique", "currency" => "Meticais", "code" => "MZ", "symbol" => "MT",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Namibia", "currency" => "Dollars", "code" => "NAD", "symbol" => '$',
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Nepal", "currency" => "Rupees", "code" => "NPR", "symbol" => "₨",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Netherlands Antilles", "currency" => "Guilders", "code" => "ANG", "symbol" => "ƒ",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Netherlands", "currency" => "Euro", "code" => "EUR", "symbol" => "€",
                "thousand_separator" => ".", "decimal_separator" => ",", 'is_activated' => true
            ],
            [
                "country" => "New Zealand", "currency" => "Dollars", "code" => "NZD", "symbol" => '$',
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Nicaragua", "currency" => "Cordobas", "code" => "NIO", "symbol" => "C$",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Nigeria", "currency" => "Nairas", "code" => "NGN", "symbol" => "₦",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "North Korea", "currency" => "Won", "code" => "KPW", "symbol" => "₩",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Norway", "currency" => "Krone", "code" => "NOK", "symbol" => "kr",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Oman", "currency" => "Rials", "code" => "OMR", "symbol" => "﷼",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Pakistan", "currency" => "Rupees", "code" => "PKR", "symbol" => "₨",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Panama", "currency" => "Balboa", "code" => "PAB", "symbol" => "B/.",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Paraguay", "currency" => "Guarani", "code" => "PYG", "symbol" => "Gs",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Peru", "currency" => "Nuevos Soles", "code" => "PE", "symbol" => "S/.",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Philippines", "currency" => "Pesos", "code" => "PHP", "symbol" => "Php",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Poland", "currency" => "Zlotych", "code" => "PL", "symbol" => "zł",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Qatar", "currency" => "Rials", "code" => "QAR", "symbol" => "﷼",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Romania", "currency" => "New Lei", "code" => "RO", "symbol" => "lei",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Russia", "currency" => "Rubles", "code" => "RUB", "symbol" => "руб",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Saint Helena", "currency" => "Pounds", "code" => "SHP", "symbol" => "£",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Saudi Arabia", "currency" => "Riyals", "code" => "SAR", "symbol" => "﷼",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Serbia", "currency" => "Dinars", "code" => "RSD", "symbol" => "Дин.",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Seychelles", "currency" => "Rupees", "code" => "SCR", "symbol" => "₨",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Singapore", "currency" => "Dollars", "code" => "SGD", "symbol" => '$',
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Slovenia", "currency" => "Euro", "code" => "EUR", "symbol" => "€",
                "thousand_separator" => ".", "decimal_separator" => ",", 'is_activated' => true
            ],
            [
                "country" => "Solomon Islands", "currency" => "Dollars", "code" => "SBD", "symbol" => '$',
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Somalia", "currency" => "Shillings", "code" => "SOS", "symbol" => "S",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "South Africa", "currency" => "Rand", "code" => "ZAR", "symbol" => "R",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "South Korea", "currency" => "Won", "code" => "KRW", "symbol" => "₩",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Spain", "currency" => "Euro", "code" => "EUR", "symbol" => "€",
                "thousand_separator" => ".", "decimal_separator" => ",", 'is_activated' => true
            ],
            [
                "country" => "Sri Lanka", "currency" => "Rupees", "code" => "LKR", "symbol" => "₨",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Sweden", "currency" => "Kronor", "code" => "SEK", "symbol" => "kr",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Switzerland", "currency" => "Francs", "code" => "CHF", "symbol" => "CHF",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Suriname", "currency" => "Dollars", "code" => "SRD", "symbol" => '$',
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Syria", "currency" => "Pounds", "code" => "SYP", "symbol" => "£",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Taiwan", "currency" => "New Dollars", "code" => "TWD", "symbol" => "NT$",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Thailand", "currency" => "Baht", "code" => "THB", "symbol" => "฿",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Trinidad and Tobago", "currency" => "Dollars", "code" => "TTD", "symbol" => "TT$",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Turkey", "currency" => "Lira", "code" => "TRY", "symbol" => "TL",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Turkey", "currency" => "Liras", "code" => "TRL", "symbol" => "£",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Tuvalu", "currency" => "Dollars", "code" => "TVD", "symbol" => '$',
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Ukraine", "currency" => "Hryvnia", "code" => "UAH", "symbol" => "₴",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "United Kingdom", "currency" => "Pounds", "code" => "GBP", "symbol" => "£",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "United States of America", "currency" => "Dollars", "code" => "USD", "symbol" => '$',
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Uruguay", "currency" => "Pesos", "code" => "UYU", "symbol" => '$U',
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Uzbekistan", "currency" => "Sums", "code" => "UZS", "symbol" => "лв",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Vatican City", "currency" => "Euro", "code" => "EUR", "symbol" => "€",
                "thousand_separator" => ".", "decimal_separator" => ",", 'is_activated' => true
            ],
            [
                "country" => "Venezuela", "currency" => "Bolivares Fuertes", "code" => "VEF", "symbol" => "Bs",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Vietnam", "currency" => "Dong", "code" => "VND", "symbol" => "₫",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Yemen", "currency" => "Rials", "code" => "YER", "symbol" => "﷼",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Zimbabwe", "currency" => "Zimbabwe Dollars", "code" => "ZWD", "symbol" => "Z$",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Iraq", "currency" => "Iraqi dinar", "code" => "IQD", "symbol" => "د.ع",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            [
                "country" => "Kenya", "currency" => "Kenyan shilling", "code" => "KES", "symbol" => "KSh",
                "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true
            ],
            ["country" => "Bangladesh", "currency" => "Taka", "code" => "BDT", "symbol" => "৳", "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true],

            ["country" => "Algerie", "currency" => "Algerian dinar", "code" => "DZD", "symbol" => "د.ج", "thousand_separator" => " ", "decimal_separator" => ".", 'is_activated' => true],
            ["country" => "United Arab Emirates", "currency" => "United Arab Emirates dirham", "code" => "AED", "symbol" => "د.إ", "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true],
            ["country" => "Uganda", "currency" => "Uganda shillings", "code" => "UGX", "symbol" => "USh", "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true],
            ["country" => "Tanzania", "currency" => "Tanzanian shilling", "code" => "TZS", "symbol" => "TSh", "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true],
            ["country" => "Angola", "currency" => "Kwanza", "code" => "AOA", "symbol" => "Kz", "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true],
            ["country" => "Kuwait", "currency" => "Kuwaiti dinar", "code" => "KWD", "symbol" => "KD", "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true],
            ["country" => "Bahrain", "currency" => "Bahraini dinar", "code" => "BHD", "symbol" => "BD", "thousand_separator" => ",", "decimal_separator" => ".", 'is_activated' => true]
        ];

        Currency::insert($data);
    }
}
