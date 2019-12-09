SELECT REVERSE(REPLACE(SUBSTRING(phone_number, 2), '05', '5')) AS `rebmunenohp` FROM distrib
WHERE phone_number LIKE '05%';
