USE corespace;

INSERT INTO processors(pid, startstamp) VALUES ("o8cw7n49w74", "0000000000");

SELECT * FROM users;
SELECT * FROM processors;

DELETE FROM processors WHERE pid="29f82fd76b5fdb1cda9f1c3b4420290fb5670caa29ed6a05b58c48d6e144315e";

UPDATE transactions SET processor="1" WHERE processor IS NULL LIMIT 1;
UPDATE transactions SET processor="" WHERE processor LIMIT 1;

SELECT * FROM transactions WHERE processor IS NULL LIMIT 1;
SELECT * FROM transactions;