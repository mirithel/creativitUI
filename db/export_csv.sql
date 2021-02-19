
SELECT users.id, ideas.id, REPLACE(REPLACE (ideas.idea_text,'\n', ' '),'"','\''), ideas.assistant_id, permutations.question_id, users.code, users.created_at, users.perm_id FROM users
INNER JOIN ideas ON users.id=ideas.user_id
INNER JOIN permutations ON users.perm_id=permutations.permutation_id AND ideas.assistant_id=permutations.assistant_id
ORDER BY ideas.id
INTO OUTFILE "Masterarbeit2020.csv"
FIELDS TERMINATED BY '|'
ENCLOSED BY '"'
LINES TERMINATED BY '\n';
