CREATE TABLE ip_bauvorhaben (
    id int NOT NULL AUTO_INCREMENT,
    bezeichnung varchar(255) NULL,
    PRIMARY KEY (id)
)
  ENGINE = MyISAM
  DEFAULT CHARSET = utf8;

ALTER TABLE ip_invoices ADD bauvorhaben_id int NOT NULL  AFTER client_id;

INSERT INTO `ip_tax_rates` (`tax_rate_id`, `tax_rate_name`, `tax_rate_percent`) VALUES
(1,	'7%',	7.00),
(2,	'16%',	16.00),
(3,	'19%',	19.00);


INSERT INTO `ip_units` (`unit_id`, `unit_name`, `unit_name_plrl`) VALUES
(1,	'pauschal',	'pauschal'),
(2,	'Std',	'Std'),
(3,	'm²',	'm²'),
(4,	'lfm',	'lfm'),
(5,	'm',	'm'),
(6,	'stück',	'stück');


UPDATE ip_settings SET setting_key = 'default_language', setting_value = 'german' WHERE setting_id = 19;
UPDATE ip_settings SET setting_key = 'date_format', setting_value = 'd-m-Y' WHERE setting_id = 20;
UPDATE ip_settings SET setting_key = 'currency_symbol', setting_value = '€' WHERE setting_id = 21;
UPDATE ip_settings SET setting_key = 'currency_symbol_placement', setting_value = 'afterspace' WHERE setting_id = 22;
UPDATE ip_settings SET setting_key = 'currency_code', setting_value = 'EUR' WHERE setting_id = 23;
UPDATE ip_settings SET setting_key = 'default_invoice_group', setting_value = '3' WHERE setting_id = 26;
UPDATE ip_settings SET setting_key = 'tax_rate_decimal_places', setting_value = '2' WHERE setting_id = 31;
UPDATE ip_settings SET setting_key = 'read_only_toggle', setting_value = '5' WHERE setting_id = 39;
UPDATE ip_settings SET setting_key = 'projects_enabled', setting_value = '0' WHERE setting_id = 50;
UPDATE ip_settings SET setting_key = 'first_day_of_week', setting_value = '1' WHERE setting_id = 52;
UPDATE ip_settings SET setting_key = 'default_country', setting_value = '' WHERE setting_id = 53;
UPDATE ip_settings SET setting_key = 'number_format', setting_value = 'number_format_european' WHERE setting_id = 55;
UPDATE ip_settings SET setting_key = 'disable_quickactions', setting_value = '1' WHERE setting_id = 58;
UPDATE ip_settings SET setting_key = 'default_invoice_tax_rate', setting_value = '3' WHERE setting_id = 64;
UPDATE ip_settings SET setting_key = 'default_include_item_tax', setting_value = '1' WHERE setting_id = 78;
UPDATE ip_settings SET setting_key = 'enable_permissive_search_clients', setting_value = '1' WHERE setting_id = 80;
UPDATE ip_settings SET setting_key = 'projects_enabled', setting_value = '0' WHERE setting_id = 257;
