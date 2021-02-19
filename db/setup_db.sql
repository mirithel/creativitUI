# Dump of table ideas
# ------------------------------------------------------------
DROP TABLE IF EXISTS users;

CREATE TABLE users (
  id int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  valid boolean DEFAULT TRUE,
  code varchar(10) UNIQUE,
  perm_id int(11) unsigned NOT NULL,
  position int(4) unsigned NOT NULL,
  created_at timestamp DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS assistants;

CREATE TABLE assistants (
  type enum ("blank","pic","chat","search") NOT NULL PRIMARY KEY,
  needs_keyword boolean DEFAULT FALSE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO assistants(type, needs_keyword) VALUES
  ("blank",false),
  ("pic",false),
  ("chat",false),
  ("search",true);

DROP TABLE IF EXISTS questions;

CREATE TABLE questions (
  id int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  question varchar(512),
  keyword varchar(30)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO questions(question,keyword) VALUES
  ("Wie kann deine Heimatstadt attraktiver für Touristen gemacht werden?","Tourismus"),
  ("Wie können Supermärkte nachhaltiger werden?","Supermarkt"),
  ("Wie kann Hausarbeit angenehmer gestaltet werden?","Hausarbeit"),
  ("Wie können junge Menschen motiviert werden, sich in der Politik zu engagieren?","Politik");

DROP TABLE IF EXISTS permutations;

CREATE TABLE permutations (
  unique_id int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  permutation_id int(11) unsigned NOT NULL,
  position int(11) unsigned NOT NULL,
  assistant_id int(11) unsigned NOT NULL,
  question_id int(11) unsigned NOT NULL,
  FOREIGN KEY (assistant_id) REFERENCES assistants(id),
  FOREIGN KEY (question_id) REFERENCES questions(id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO permutations(permutation_id,position,assistant_id,question_id) VALUES
  (1,1,1,1),
  (1,2,2,2),
  (1,3,4,4),
  (1,4,3,3),

  (2,1,2,3),
  (2,2,3,4),
  (2,3,1,2),
  (2,4,4,1),

  (3,1,3,1),
  (3,2,4,2),
  (3,3,2,4),
  (3,4,1,3),

  (4,1,4,3),
  (4,2,1,4),
  (4,3,3,2),
  (4,4,2,1),

  (5,1,1,1),
  (5,2,2,2),
  (5,3,4,4),
  (5,4,3,3),

  (6,1,2,3),
  (6,2,3,4),
  (6,3,1,2),
  (6,4,4,1),

  (7,1,3,1),
  (7,2,4,2),
  (7,3,2,4),
  (7,4,1,3),

  (8,1,4,3),
  (8,2,1,4),
  (8,3,3,2),
  (8,4,2,1),

  (9,1,1,1),
  (9,2,2,2),
  (9,3,4,4),
  (9,4,3,3),

  (10,1,2,3),
  (10,2,3,4),
  (10,3,1,2),
  (10,4,4,1),

  (11,1,3,1),
  (11,2,4,2),
  (11,3,2,4),
  (11,4,1,3),

  (12,1,4,3),
  (12,2,1,4),
  (12,3,3,2),
  (12,4,2,1),

  (13,1,1,1),
  (13,2,2,2),
  (13,3,4,4),
  (13,4,3,3),

  (14,1,2,3),
  (14,2,3,4),
  (14,3,1,2),
  (14,4,4,1),

  (15,1,3,1),
  (15,2,4,2),
  (15,3,2,4),
  (15,4,1,3),

  (16,1,4,3),
  (16,2,1,4),
  (16,3,3,2),
  (16,4,2,1),

  (17,1,1,1),
  (17,2,2,2),
  (17,3,4,4),
  (17,4,3,3),

  (18,1,2,3),
  (18,2,3,4),
  (18,3,1,2),
  (18,4,4,1),

  (19,1,3,1),
  (19,2,4,2),
  (19,3,2,4),
  (19,4,1,3),

  (20,1,4,3),
  (20,2,1,4),
  (20,3,3,2),
  (20,4,2,1),

  (21,1,1,1),
  (21,2,2,2),
  (21,3,4,4),
  (21,4,3,3),

  (22,1,2,3),
  (22,2,3,4),
  (22,3,1,2),
  (22,4,4,1),

  (23,1,3,1),
  (23,2,4,2),
  (23,3,2,4),
  (23,4,1,3),

  (24,1,4,3),
  (24,2,1,4),
  (24,3,3,2),
  (24,4,2,1),

  (25,1,1,1),
  (25,2,2,2),
  (25,3,4,4),
  (25,4,3,3),

  (26,1,2,3),
  (26,2,3,4),
  (26,3,1,2),
  (26,4,4,1),

  (27,1,3,1),
  (27,2,4,2),
  (27,3,2,4),
  (27,4,1,3),

  (28,1,4,3),
  (28,2,1,4),
  (28,3,3,2),
  (28,4,2,1);

DROP TABLE IF EXISTS current_conf;

CREATE TABLE current_conf (
  unique_id int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  current_perm int(11) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO current_conf(current_perm) VALUES
  (1);

DROP TABLE IF EXISTS ideas;

CREATE TABLE ideas (
  id int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  idea_text varchar(512) DEFAULT NULL,

  user_id int(11) unsigned NOT NULL,
  -- question_id int(11) unsigned NOT NULL,
  assistant_id int(11) unsigned NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id),
  -- FOREIGN KEY (question_id) REFERENCES questions(id),
  FOREIGN KEY (assistant_id) REFERENCES assistants(id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS experience;

CREATE TABLE experience (
  id VARCHAR(6) DEFAULT NULL,
  exp_answer_1 int(11) DEFAULT NULL,
  exp_answer_2 int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS experience;

CREATE TABLE experience (
  id int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  exp_answer_1 int(11) DEFAULT NULL,
  exp_answer_2 int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;