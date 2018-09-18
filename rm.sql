-- MySQL dump 10.13  Distrib 5.5.54, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: crm-ch
-- ------------------------------------------------------
-- Server version	5.5.54-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `calendar_events`
--

DROP TABLE IF EXISTS `calendar_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calendar_events` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `userid` int(11) NOT NULL,
  `projectid` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calendar_events`
--

LOCK TABLES `calendar_events` WRITE;
/*!40000 ALTER TABLE `calendar_events` DISABLE KEYS */;
INSERT INTO `calendar_events` VALUES (1,'Milestone review','2017-11-30 11:00:00','2017-11-30 13:00:00','Management Meeting',1,7);
/*!40000 ALTER TABLE `calendar_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `id` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('01mr53734u6u66qhfjfpsmqls5s8dth1','10.240.0.227',1519989042,'__ci_last_regenerate|i:1519989042;'),('03a4qq09ea6iinvd503f7h3ota93rpbf','10.240.0.90',1519989888,'__ci_last_regenerate|i:1519989888;'),('041711s4em3n7nn1b8mnm6u0jhodpqvs','10.240.0.222',1519990329,'__ci_last_regenerate|i:1519990329;'),('04c11g8dns7mrmkb762b14trs1vr1aet','10.240.0.87',1519990108,'__ci_last_regenerate|i:1519990108;'),('04i54eanbqjlmgk28ejn3e3hck1277ul','10.240.0.185',1519990258,'__ci_last_regenerate|i:1519990258;'),('05frnhbhlagc52a3rav2dgoqn36ig9fj','10.240.0.187',1519986765,'__ci_last_regenerate|i:1519986765;'),('06n7pp3ub1h73m2grhj292vuf83qohng','10.240.1.0',1519989462,'__ci_last_regenerate|i:1519989462;'),('06nitpar8og8g5rlh0pc1ep6r9ij9vi7','10.240.1.97',1519989468,'__ci_last_regenerate|i:1519989468;'),('077oaerftg9iuj45o1er4e4sjsfmkk1b','10.240.0.187',1519990298,'__ci_last_regenerate|i:1519990298;'),('0a9tvan9pf5fdfauqqkh82cko60dq1hh','10.240.0.88',1519990483,'__ci_last_regenerate|i:1519990483;'),('0bmkfm0l2npapeirerqnab261tq1h81r','10.240.1.97',1519990053,'__ci_last_regenerate|i:1519990053;'),('0e39a1pe7cq6g0shfvqa74fuof6416q7','10.240.1.0',1519988827,'__ci_last_regenerate|i:1519988827;'),('0ep41m1p9c4h0vdvrrme0qsqfc3rj677','10.240.0.88',1519987491,'__ci_last_regenerate|i:1519987491;'),('0ev1tqr0u8rrd64mfrl7bkik1t5pfdbg','10.240.1.0',1519989283,'__ci_last_regenerate|i:1519989283;'),('0g46ne9m5ivop2jsr0tpauat1snuja06','10.240.1.97',1519990353,'__ci_last_regenerate|i:1519990353;'),('0h5lusrnfek3ckd3gunt5k7s6dr24mgl','10.240.1.0',1519988527,'__ci_last_regenerate|i:1519988527;'),('0i598u5klt0pvut274mdn1hpu9o5ddb3','10.240.0.187',1519989783,'__ci_last_regenerate|i:1519989783;'),('0jevtc5vt0fug3vdoclve1k2182mcccs','10.240.0.88',1519986866,'__ci_last_regenerate|i:1519986866;'),('0kotaf8rfgulrosneaf2q2jspr58hl75','10.240.0.185',1519986800,'__ci_last_regenerate|i:1519986800;'),('0lcg00h0han85lhh51576s111e2u0rav','10.240.0.88',1519987576,'__ci_last_regenerate|i:1519987576;'),('0lltct7roslstav8ilofkmsp60aq6gh7','10.240.1.220',1519987150,'__ci_last_regenerate|i:1519987150;'),('0mpmq86ugjqb2fi4kk0lt3vacq4ber93','10.240.1.0',1519988717,'__ci_last_regenerate|i:1519988717;'),('0n5psd3ib8qi02osf0gn2m5fm4na2hu6','10.240.0.87',1519987792,'__ci_last_regenerate|i:1519987792;'),('0nc7sfdkbde7teq8teareep0cbslb4dp','10.240.1.220',1519990018,'__ci_last_regenerate|i:1519990018;'),('0nt3k4t2kob21emtb1svj22rnubdrm1p','10.240.1.99',1519990658,'__ci_last_regenerate|i:1519990658;'),('0o1nbpmeh482sk1ta5nsi54brhttueov','10.240.0.239',1519990023,'__ci_last_regenerate|i:1519990023;'),('0oda4iiqk83pg8i2eta048au630oni71','10.240.0.222',1519986935,'__ci_last_regenerate|i:1519986935;'),('0oubvg3d866i30f5mhvk147aemaau9ku','10.240.1.220',1519989302,'__ci_last_regenerate|i:1519989302;'),('0pvn7nas80t3k8kgu284dmq9jt4hqu90','10.240.1.97',1519990068,'__ci_last_regenerate|i:1519990068;'),('0qnma4g691tpbs4f6phqrbbnaoqmsji2','10.240.1.220',1519990638,'__ci_last_regenerate|i:1519990638;'),('0s4enmfrcqmg7ismte40rcauhlrnmaqc','10.240.1.189',1519988688,'__ci_last_regenerate|i:1519988688;'),('0v0h0embnm79o22ga9d6j1rg1sjbtssc','10.240.1.99',1519987181,'__ci_last_regenerate|i:1519987181;'),('0valaci701nr8of8r1btvminf6h75gbv','10.240.1.0',1519988612,'__ci_last_regenerate|i:1519988612;'),('0vtslrn46qj55pscfk68h8ibev52ko4p','10.240.1.99',1519989242,'__ci_last_regenerate|i:1519989242;'),('10qhvsq17j9ndhq1aerr75ldgtqgnu6l','10.240.1.220',1519987360,'__ci_last_regenerate|i:1519987360;'),('126afdhn95ne2t35h496asc8i8lg40pk','10.240.1.189',1519987260,'__ci_last_regenerate|i:1519987260;'),('13fvslqg5mnkm5eeeu97qflc0c1l8s3j','10.240.1.0',1519988421,'__ci_last_regenerate|i:1519988421;'),('17pb9j1cppm1cplvtnv92lner9ulri5f','10.240.0.227',1519989172,'__ci_last_regenerate|i:1519989172;'),('17tfhtecfuvf7gopt9e0ufgidhbde58d','10.240.1.97',1519989403,'__ci_last_regenerate|i:1519989403;'),('1a937hp0ssfqdaa36r7vfdstbq76nbfl','10.240.0.87',1519989587,'__ci_last_regenerate|i:1519989587;'),('1g7gneaj8de49t07eqpo22lv511solch','10.240.1.220',1519989362,'__ci_last_regenerate|i:1519989362;'),('1gdrbbaan640fslcjrm3mn8emfg7giqq','10.240.1.0',1519988757,'__ci_last_regenerate|i:1519988757;'),('1haq43j4akugmis4oovfnmh8t9k7q1k6','10.240.0.239',1519986890,'__ci_last_regenerate|i:1519986890;'),('1jkl8lraktcejv633es74rt3154o3iln','10.240.1.189',1519990288,'__ci_last_regenerate|i:1519990288;'),('1kumnb54l9rbt7qr8s4u4a03p8486oud','10.240.1.99',1519988647,'__ci_last_regenerate|i:1519988647;'),('1lf4fr8a35n08oqm5fdiciq2t2s94jam','10.240.0.90',1519990558,'__ci_last_regenerate|i:1519990558;'),('1m4tbfh5ddlsrqd3efcu6a2a65mra764','10.240.0.187',1519990618,'__ci_last_regenerate|i:1519990618;'),('1mk1kjh9n50udiqkbb738u3udrnf7cm2','10.240.1.97',1519990093,'__ci_last_regenerate|i:1519990093;'),('1p04uih7vsp94ob28b02li58vuknv34e','10.240.0.187',1519990413,'__ci_last_regenerate|i:1519990413;'),('1pi1118vldi40fo35tmglefc81hm6sdh','10.240.0.227',1519988321,'__ci_last_regenerate|i:1519988321;'),('1po6un1535601c0nf1j98q7beqpfhppv','10.240.1.0',1519988176,'__ci_last_regenerate|i:1519988176;'),('1rtffunac8u3a79e2br1dmra1f3a9ltn','10.240.1.220',1519988978,'__ci_last_regenerate|i:1519988978;'),('1uf33h61lj6i1vuksobltqm87a5g7a6j','10.240.1.0',1519988386,'__ci_last_regenerate|i:1519988386;'),('1v076mh2jg36hlj408e83rcge1485na9','10.240.1.97',1519989002,'__ci_last_regenerate|i:1519989002;'),('1v22gnatv60ngl6ofvtqenm6b094e20a','10.240.1.0',1519988131,'__ci_last_regenerate|i:1519988131;'),('234hieri5k71ne539pkv6vo51vqs9hvr','10.240.1.189',1519989672,'__ci_last_regenerate|i:1519989672;'),('24q2dj3j83ck0n71v0o61o8fh4a12hs2','10.240.1.0',1519988306,'__ci_last_regenerate|i:1519988306;'),('24snajlr4bditp05edpgcsf9mj50rfd0','10.240.1.97',1519990223,'__ci_last_regenerate|i:1519990223;'),('26bdn38rk5mtam29o03bm8fusq659n51','10.240.1.0',1519988246,'__ci_last_regenerate|i:1519988246;'),('26jqjk5bnidib30a8q7v6970hbah8617','10.240.1.189',1519990743,'__ci_last_regenerate|i:1519990743;'),('27dc7tkb2a0u2lsfb637g3hk2du8dr75','10.240.0.187',1519987071,'__ci_last_regenerate|i:1519987071;'),('27hf0bnvm89p092pvbrp2nvcj1bl3727','10.240.0.185',1519989063,'__ci_last_regenerate|i:1519989063;'),('291llubcrnhq9r4q1eh6a5rkc1s0fufu','10.240.1.0',1519989487,'__ci_last_regenerate|i:1519989487;'),('2agjthjb5sd95oqjv5p2mgnb38vc2uv3','10.240.0.222',1519987506,'__ci_last_regenerate|i:1519987506;'),('2ak7pbek382uqdshhvjkqkangpdt498a','10.240.0.187',1519990393,'__ci_last_regenerate|i:1519990393;'),('2b12q293d3hbjfrpv0pok4870ob6j9t4','10.240.0.87',1519987551,'__ci_last_regenerate|i:1519987551;'),('2bbj7eeqqd0uaevcdebav616jl4nbva4','10.240.1.0',1519989963,'__ci_last_regenerate|i:1519989963;'),('2c46dj2904srn2nbrr7mlgpn1ckpshv3','10.240.0.185',1519989733,'__ci_last_regenerate|i:1519989733;'),('2d5ghakjusk1qsg3ggr69r2o500i6ove','10.240.0.239',1519990113,'__ci_last_regenerate|i:1519990113;'),('2f45pu94ueb7spb2co4na3c7oq089248','10.240.0.87',1519986585,'__ci_last_regenerate|i:1519986585;'),('2g840gatdvdcd5e0rv67h2of31jtu6le','10.240.0.90',1519987411,'__ci_last_regenerate|i:1519987411;'),('2hgiils6e7qo0oloi5lf6j2i666p1891','10.240.0.222',1519990708,'__ci_last_regenerate|i:1519990708;'),('2hjtpu7tng595pf8170t8uuva09le3cm','10.240.0.222',1519987546,'__ci_last_regenerate|i:1519987546;'),('2ifv9196p3u1hef3j6p3rjaba5ajnrj6','10.240.1.0',1519989938,'__ci_last_regenerate|i:1519989938;'),('2j5ms3hhl5cosps10c168i8s6gpqbb09','10.240.0.88',1519988937,'__ci_last_regenerate|i:1519988937;'),('2k4qs4teja6p29ovbnpajmvcs6rt7ebb','10.240.0.222',1519986925,'__ci_last_regenerate|i:1519986925;'),('2krjt9rsg9ntabo6o7cqcdr5c48211b0','10.240.1.220',1519987696,'__ci_last_regenerate|i:1519987696;'),('2m44bfdtmdqg4307u1g4i4buub83lmto','10.240.0.88',1519987216,'__ci_last_regenerate|i:1519987216;'),('2o6o5bh4a7evq6hu7pash14j7q1ammlr','10.240.0.185',1519986635,'__ci_last_regenerate|i:1519986635;'),('2o6p0durq94ovmlrkg7ch7v1qcr210ss','10.240.1.0',1519989037,'__ci_last_regenerate|i:1519989037;'),('2p1uad4fv0j9e3b4aevvdtetv6559dtm','10.240.0.90',1519987681,'__ci_last_regenerate|i:1519987681;'),('2p27a54vltaull745tf3lp55rok5fn1m','10.240.0.87',1519988573,'__ci_last_regenerate|i:1519988573;'),('2q62cm638lhlpdrko61ci16vhe0l2bkc','10.240.0.239',1519986514,'__ci_last_regenerate|i:1519986514;'),('2q6kk6qd3qfgaotrro1r5etk1428jt0e','10.240.0.187',1519990313,'__ci_last_regenerate|i:1519990313;'),('2scn8hsberfekj42rketqedqsbbthalm','10.240.1.99',1519988903,'__ci_last_regenerate|i:1519988903;'),('2uuj0dncfqbq2clonbmuaefuf80qk6cf','10.240.1.220',1519987396,'__ci_last_regenerate|i:1519987396;'),('30d9p7okq1mq0infq0qi9p8lo964q6k9','10.240.1.189',1519990668,'__ci_last_regenerate|i:1519990668;'),('30ocah1rp17fu3gl99sr5mb1p5jeaisj','10.240.1.97',1519986445,'__ci_last_regenerate|i:1519986445;'),('31h3ke04kqum5arha049ckg85qm7vu9u','10.240.0.222',1519989082,'__ci_last_regenerate|i:1519989082;'),('32kjrocm4qslr7nekacohun1lkcn3gg2','10.240.0.88',1519986536,'__ci_last_regenerate|i:1519986536;'),('3476o1uj5eihuivtgi6nmofjainvtv75','10.240.0.87',1519989883,'__ci_last_regenerate|i:1519989883;'),('3715hn9cihqa9e37fp5khg2f8ck7c14t','10.240.0.90',1519988512,'__ci_last_regenerate|i:1519988512;'),('37kn4c51vj2k8gcav7lqa2q7ggosmq51','10.240.0.90',1519990073,'__ci_last_regenerate|i:1519990073;'),('37n3pp7c89odd3vd618oth8e4gj8gg6u','10.240.0.87',1519986876,'__ci_last_regenerate|i:1519986876;'),('3asdsajqm833tlg1l698f1g4b72f75j9','10.240.0.185',1519987335,'__ci_last_regenerate|i:1519987335;'),('3bfec76v49eg81g2apl7jo97n9fh4p9q','10.240.1.0',1519988381,'__ci_last_regenerate|i:1519988381;'),('3dfl1sblfhbtsuaukol2h90tbakit18k','10.240.1.97',1519987005,'__ci_last_regenerate|i:1519987005;'),('3e6bb933c12f0c7js6esjuiplajt3rai','10.240.0.88',1519986995,'__ci_last_regenerate|i:1519986995;'),('3htdbdr043rukm7rj6nioggu3ro5agki','10.240.1.189',1519987731,'__ci_last_regenerate|i:1519987731;'),('3jbpqht0acqak6s6nk6pare42bseju39','10.240.1.0',1519988677,'__ci_last_regenerate|i:1519988677;'),('3k0oikdn3gqi6b8vu3n4mj7v5240snef','10.240.1.0',1519988927,'__ci_last_regenerate|i:1519988927;'),('3n3dfimjg69cav3oepif724filj6b8qd','10.240.1.189',1519987746,'__ci_last_regenerate|i:1519987746;'),('3olplonuii452lao8cfje8csi6m6ldnh','10.240.1.0',1519989447,'__ci_last_regenerate|i:1519989447;'),('3p6gc18qi9uddc0l95mfum3lt6d4fgle','10.240.1.0',1519988261,'__ci_last_regenerate|i:1519988261;'),('3qg49vgl5mvp2bpg8tjl24tldl0undgl','10.240.1.0',1519988036,'__ci_last_regenerate|i:1519988036;'),('3rohipm49cu2nfdpdg6dp9v6gv0q47u4','10.240.1.220',1519987721,'__ci_last_regenerate|i:1519987721;'),('3s93garb55q1i5s0fuvpu565tqohhk1g','10.240.0.87',1519987768,'__ci_last_regenerate|i:1519987768;'),('3serr1g16crsau33ibrivf40jb7h1vum','10.240.0.187',1519990623,'__ci_last_regenerate|i:1519990623;'),('3umcu83os8di4rk2rlq7lqs38oqmsoc9','10.240.0.239',1519987446,'__ci_last_regenerate|i:1519987446;'),('3urkjeke9dr4sm2rq2646t667knof3je','10.240.1.0',1519988001,'__ci_last_regenerate|i:1519988001;'),('40r3qnnr48rgsblahglt71ca0rn7isb6','10.240.0.88',1519988918,'__ci_last_regenerate|i:1519988918;'),('413rgacr7t7atffrvv50e73q26vpiutl','10.240.1.0',1519989868,'__ci_last_regenerate|i:1519989868;'),('4286n7eht23155u8clv8i9lhqb98f88b','10.240.0.87',1519990248,'__ci_last_regenerate|i:1519990248;'),('44l11bdgapukhqdhpli3j012fdi2lmmp','10.240.0.227',1519987320,'__ci_last_regenerate|i:1519987320;'),('44lkrt6moei9ilus175anrhagcaromhr','10.240.0.88',1519989287,'__ci_last_regenerate|i:1519989287;'),('45l70d0o5d8e9in3upl63srtl4ooaqq6','10.240.0.222',1519989778,'__ci_last_regenerate|i:1519989778;'),('46707s11ercrhno85bqiqc5edjjcibi0','10.240.0.187',1519989332,'__ci_last_regenerate|i:1519989332;'),('472mp0i7qfcqk37898hnhq90tt31n7tj','10.240.0.87',1519990028,'__ci_last_regenerate|i:1519990028;'),('483hf90csac3m2cpie18o3k0jo5pej28','10.240.1.99',1519989413,'__ci_last_regenerate|i:1519989413;'),('4anclkvven83n82us9aisq9h9lrbcupv','10.240.1.99',1519990333,'__ci_last_regenerate|i:1519990333;'),('4d23m5t4n0630ba3ch40mbik83lvtioa','10.240.1.220',1519989983,'__ci_last_regenerate|i:1519989983;'),('4daiea2mpupro6tlv9afhaepfpvf2e2r','10.240.1.220',1519987751,'__ci_last_regenerate|i:1519987751;'),('4dro1h5u3daukpc9a1bnvucacsk7ehtc','10.240.0.90',1519983225,'__ci_last_regenerate|i:1519980429;'),('4e0l63ucniju5v00flpnd8e0tja3lt1u','10.240.1.97',1519990063,'__ci_last_regenerate|i:1519990063;'),('4fj888hlg0v3o9qr35gao113sb11ilr2','10.240.0.90',1519986660,'__ci_last_regenerate|i:1519986660;'),('4htjn33totbifs7mq8resfiur207t0tf','10.240.1.99',1519989547,'__ci_last_regenerate|i:1519989547;'),('4jjq5hnjblb5edqfh9avsecn7uaccutp','10.240.0.222',1519989958,'__ci_last_regenerate|i:1519989958;'),('4ohat5434r4l86l2idaef4l717chagt4','10.240.0.87',1519986536,'__ci_last_regenerate|i:1519986536;'),('4pt4le6513vm2a6lsd964n7jebtt6bv6','10.240.0.90',1519989873,'__ci_last_regenerate|i:1519989873;'),('4qud0epl7jdc2h2map7m1h524i6abp9e','10.240.0.227',1519990278,'__ci_last_regenerate|i:1519990278;'),('506rsfiiiv6jqb11em8dga7gt1odgock','10.240.1.220',1519987161,'__ci_last_regenerate|i:1519987161;'),('52odp7ec95ejvlqlnnceas954l591eur','10.240.0.187',1519990338,'__ci_last_regenerate|i:1519990338;'),('551khm5e53a29n8nspfhvo2lc34c6m7t','10.240.1.220',1519987371,'__ci_last_regenerate|i:1519987371;'),('575408f6k2j3f3op6sj289uigvheabl9','10.240.0.88',1519989793,'__ci_last_regenerate|i:1519989793;'),('57irjjoo9i54d16p04a723mo7mltqr6f','10.240.1.189',1519988142,'__ci_last_regenerate|i:1519988142;'),('592qf0ot7d42462pe96sbp0vhe6lnd3q','10.240.1.97',1519988852,'__ci_last_regenerate|i:1519988852;'),('59fg0m662q4matjatnhu8ll8qqfuc6nj','10.240.1.220',1519988366,'__ci_last_regenerate|i:1519988366;'),('5aljk8n5mk4msi5ehb09ce7eqe9rvuoj','10.240.0.187',1519987125,'__ci_last_regenerate|i:1519987125;'),('5b8s9mt5njchppvkcvtgs2noc60peh4c','10.240.1.97',1519989028,'__ci_last_regenerate|i:1519989028;'),('5b9huvem82ephnaej3m3k6cu7qkm36vb','10.240.1.99',1519990123,'__ci_last_regenerate|i:1519990123;'),('5bokmlm1r5a3bnlcr1vsh1ebqs4e9vjr','10.240.0.185',1519987201,'__ci_last_regenerate|i:1519987201;'),('5bvr0keomcphgp1tfv6rv8io12oh99sa','10.240.1.0',1519988431,'__ci_last_regenerate|i:1519988431;'),('5f4l3o27of5mqti4qilb86cqsk7qmjln','10.240.0.90',1519990148,'__ci_last_regenerate|i:1519990148;'),('5ffn7aeg1vv1j251fc79qv2ngi0eqk9d','10.240.1.189',1519987792,'__ci_last_regenerate|i:1519987792;'),('5fiqbg4eh8da1gu80up5t81kln8e980t','10.240.1.0',1519989022,'__ci_last_regenerate|i:1519989022;'),('5frlc5k4fk1e8unj2fqmkmcsf8f67t6f','10.240.1.0',1519989183,'__ci_last_regenerate|i:1519989183;'),('5h3j6252hffc3c59o7flqr76psom3u1j','10.240.0.88',1519989537,'__ci_last_regenerate|i:1519989537;'),('5hucldv6nku79ta1saehbv4mebbv3j06','10.240.1.0',1519987946,'__ci_last_regenerate|i:1519987946;'),('5i30o4ug00n2khssessfhu8gr329dj4v','10.240.0.87',1519986885,'__ci_last_regenerate|i:1519986885;'),('5i9mq7qkp0fv9ta0gfa2abcmra5l4aat','10.240.1.220',1519990048,'__ci_last_regenerate|i:1519990048;'),('5j4i1sgv252p85qqtcnietba3skdvm5h','10.240.1.97',1519987176,'__ci_last_regenerate|i:1519987176;'),('5jadlr1r66vpo7j8n6v47563j8lkc6ng','10.240.1.97',1519990493,'__ci_last_regenerate|i:1519990493;'),('5plksnebcqkb8tklulcavmob4k1tldrb','10.240.0.88',1519987105,'__ci_last_regenerate|i:1519987105;'),('5q9uroak196dcjhgg1h5ad2bfd56mpjl','10.240.1.220',1519987836,'__ci_last_regenerate|i:1519987836;'),('5s8cur40kbjt7k5ij58louvvd1242300','10.240.0.87',1519986986,'__ci_last_regenerate|i:1519986986;'),('5tbunaqj5nhh5lac49b68couklqo1gjf','10.240.0.185',1519987111,'__ci_last_regenerate|i:1519987111;'),('5tug68e3r8up9o5k00apc71ebt2j8r6e','10.240.1.189',1519990183,'__ci_last_regenerate|i:1519990183;'),('5vu487e77l3t8kko128v9r7iutngu4e8','10.240.0.222',1519988146,'__ci_last_regenerate|i:1519988146;'),('608dg231s5p76smnppe6q6gg7300665t','10.240.1.0',1519989147,'__ci_last_regenerate|i:1519989147;'),('63fl10psv3r293k7otgvcn44j43deb1t','10.240.0.90',1519988773,'__ci_last_regenerate|i:1519988773;'),('644i60b8r2q1e3et2r81iaorlvba9hpv','10.240.0.87',1519987711,'__ci_last_regenerate|i:1519987711;'),('66a95fdo58sfcustbj3drnma86bj3rkp','10.240.0.222',1519989067,'__ci_last_regenerate|i:1519989067;'),('67gusle7db78sjpipdi0amadgea5rhe9','10.240.1.99',1519987451,'__ci_last_regenerate|i:1519987451;'),('67sfsoltb3j6ap12c0mhkr18fh11hjbk','10.240.1.97',1519988867,'__ci_last_regenerate|i:1519988867;'),('697ua4p2ovv9ce7lrdei03p45066fd4o','10.240.1.97',1519989838,'__ci_last_regenerate|i:1519989838;'),('69i5qfkprr1b3dj0qla8jiu92d3ch59b','10.240.0.239',1519988883,'__ci_last_regenerate|i:1519988883;'),('6ab56q4diok0496c21p9714q0k6a37b9','10.240.0.87',1519989918,'__ci_last_regenerate|i:1519989918;'),('6atp5p1dki3mnl5ssdimhj4job0r82hu','10.240.1.220',1519987606,'__ci_last_regenerate|i:1519987606;'),('6bbksnta0p7pneuin0r7s0umfer6l1ad','10.240.0.90',1519988502,'__ci_last_regenerate|i:1519988502;'),('6bhtscjtrd7246953hqp3lns6g44td21','10.240.0.222',1519987291,'__ci_last_regenerate|i:1519987290;'),('6d3co0p6dcai8l59des8f2od1o4d0f3n','10.240.0.90',1519988181,'__ci_last_regenerate|i:1519988181;'),('6d6pksiifh551n6rj1tgh0hsggmms8j9','10.240.1.220',1519986811,'__ci_last_regenerate|i:1519986811;'),('6f0rba9clrp2n7hak4h8jbe8ef940btc','10.240.0.185',1519990058,'__ci_last_regenerate|i:1519990058;'),('6fqtc8h8crcvrc7kjli3v1jjm0r4te2v','10.240.1.220',1519988442,'__ci_last_regenerate|i:1519988442;'),('6iog89frbuejrs3nmlp9jc03qnqts2r4','10.240.1.0',1519988106,'__ci_last_regenerate|i:1519988106;'),('6ipjdfpoe8n23cg34idjjc3mdbvrmdut','10.240.0.90',1519990442,'__ci_last_regenerate|i:1519990442;'),('6ki8klir2053bcfk2n7ufnkgdhi0jvvo','10.240.0.222',1519987311,'__ci_last_regenerate|i:1519987311;'),('6kmcvpomt4pkq4dgnpikbumib93k7u2q','10.240.0.185',1519986821,'__ci_last_regenerate|i:1519986821;'),('6lcdt9vugfogo5uq3mmr67uk73i504i5','10.240.1.0',1519988376,'__ci_last_regenerate|i:1519988376;'),('6lq6220p7k24qg3vfu5j6k87uodh816n','10.240.0.239',1519987101,'__ci_last_regenerate|i:1519987101;'),('6oib68ag5sta9l2puid1nlelhkqtj8cg','10.240.1.220',1519990578,'__ci_last_regenerate|i:1519990578;'),('6p41fbqlme8c70d4scpifc42ml3p4kt5','10.240.1.0',1519988301,'__ci_last_regenerate|i:1519988301;'),('6pp69glp5dl3jii870u0qig1c9q3vj3c','10.240.0.88',1519990083,'__ci_last_regenerate|i:1519990083;'),('6q1d8tndqjnhnta80t542b6ivg7g7118','10.240.1.0',1519989813,'__ci_last_regenerate|i:1519989813;'),('6q2edfjgsdhke5v085u44bqfh8eh4uf6','10.240.0.90',1519987066,'__ci_last_regenerate|i:1519987066;'),('6qk7c58gm4lm2piq2lgvbiod8rbrt3li','10.240.0.88',1519990003,'__ci_last_regenerate|i:1519990003;'),('6svnnv1hplruk45ked3rodh19sfjupgn','10.240.1.0',1519988316,'__ci_last_regenerate|i:1519988316;'),('6tb1q0p3vg8folkfpvlsgpsgag7g67ri','10.240.1.189',1519989753,'__ci_last_regenerate|i:1519989753;'),('6tvgh94v7tr57ect1d5sjt4kqd105e8s','10.240.0.88',1519987366,'__ci_last_regenerate|i:1519987366;'),('6uqon3udpbj3v54v4mlbjp7pi2u8g90s','10.240.0.87',1519989682,'__ci_last_regenerate|i:1519989682;'),('6v8cq9jidk63ogca1jig6vg8c2spum6p','10.240.0.87',1519989122,'__ci_last_regenerate|i:1519989122;'),('6vvg0jg5c1ps9jfn8ea09fabb5itv3ai','10.240.0.239',1519989218,'__ci_last_regenerate|i:1519989218;'),('7244ph8saho9hfbhpddkpjfogdlcrpgm','10.240.1.0',1519989187,'__ci_last_regenerate|i:1519989187;'),('73j69voshv644g72c197tr2lrva40b8r','10.240.0.222',1519987757,'__ci_last_regenerate|i:1519987757;'),('73pn9admkqm95g0aahrtq6s9jmctpad2','10.240.1.0',1519988311,'__ci_last_regenerate|i:1519988311;'),('73vb13anfhbbsusng42mej7dngt10aoj','10.240.0.187',1519990479,'__ci_last_regenerate|i:1519990479;'),('76i2jm0v5cguevjg85slmjj8r947e8o8','10.240.0.222',1519989047,'__ci_last_regenerate|i:1519989047;'),('76onht20vqirppa95jshigaohnkfagps','10.240.0.87',1519990368,'__ci_last_regenerate|i:1519990368;'),('77g00f9htdit8kip0a545vlq32m5jj96','10.240.0.87',1519986520,'__ci_last_regenerate|i:1519986520;'),('7ajn1bt6uat92gubsosblj2gk67o9ovu','10.240.0.87',1519989108,'__ci_last_regenerate|i:1519989108;'),('7apbmqddpues3i54ck8697vl0ef7uca7','10.240.1.0',1519988121,'__ci_last_regenerate|i:1519988121;'),('7b4qf74am1ot80slo37i0bkrgmg44bp8','10.240.0.222',1519986511,'__ci_last_regenerate|i:1519986511;'),('7e2ksm4rdmb4g2ti3bsi5tkfflrbcol1','10.240.0.88',1519988241,'__ci_last_regenerate|i:1519988241;'),('7fq9331egopalfao58qoq6rlagfj3m5q','10.240.0.239',1519988932,'__ci_last_regenerate|i:1519988932;'),('7i0u5cojldma6r9h8rfgngha53o0fktr','10.240.0.187',1519989273,'__ci_last_regenerate|i:1519989273;'),('7igbm4stuabs4fb4o34sh1tt0qi59g2j','10.240.1.97',1519990168,'__ci_last_regenerate|i:1519990168;'),('7iim1r3f1jpvmogoejh2hcqoit647di6','10.240.1.0',1519988607,'__ci_last_regenerate|i:1519988607;'),('7jk699dc40r3dtarv7pu7srugiesjimp','10.240.1.97',1519987886,'__ci_last_regenerate|i:1519987886;'),('7l3le267iu1k9fnsneto92qr7gklg2oc','10.240.1.220',1519986443,'__ci_last_regenerate|i:1519986440;'),('7mi5g2tsftghbpkoiq7fj8k4b44huqqr','10.240.0.227',1519989052,'__ci_last_regenerate|i:1519989052;'),('7mmtd6lp8nv7ii7guhi5ifb3qebulqvl','10.240.0.222',1519989998,'__ci_last_regenerate|i:1519989998;'),('7n48p949j8a5opv1v11n17djn5vnmm24','10.240.0.239',1519988452,'__ci_last_regenerate|i:1519988452;'),('7nono7u3kidbko2tgfjipm06odk390cc','10.240.0.87',1519988231,'__ci_last_regenerate|i:1519988231;'),('7ohv6uabcluesij67qo6sgvlmm8ucjsc','10.240.1.0',1519989823,'__ci_last_regenerate|i:1519989823;'),('7qe621i5nu7euoid47v8ia1pp1pkd2ib','10.240.0.187',1519989432,'__ci_last_regenerate|i:1519989432;'),('7tlguik4ino1m72pdbfl3o4so76ijfq7','10.240.1.220',1519987381,'__ci_last_regenerate|i:1519987381;'),('7u5pslt47cedir1lpi2mgpk3lgiclmct','10.240.0.88',1519989893,'__ci_last_regenerate|i:1519989893;'),('7vc6o2tof3emu9dhtve5qickocqln79g','10.240.0.187',1519990408,'__ci_last_regenerate|i:1519990408;'),('80v2k6eodb5qp3hk9f0ppqehg7ovl9hi','10.240.0.222',1519990038,'__ci_last_regenerate|i:1519990038;'),('81c03c840jsmga0d3b3v24fdt27mum5c','10.240.1.189',1519990193,'__ci_last_regenerate|i:1519990193;'),('851on962j9b6045j5bacle9mq0nudmcs','10.240.0.187',1519988742,'__ci_last_regenerate|i:1519988742;'),('859n10aqhcksueufr98lsmoaka7bta8f','10.240.0.87',1519987966,'__ci_last_regenerate|i:1519987966;'),('87frnddh6cminmmk797thh2uem6lcggs','10.240.1.0',1519988662,'__ci_last_regenerate|i:1519988662;'),('87p6q22ldk1ko1bptbleo8hk2t9jcllb','10.240.0.90',1519989923,'__ci_last_regenerate|i:1519989923;'),('88g3fsue91ghil686k34sa9d7dht3eqd','10.240.0.90',1519988166,'__ci_last_regenerate|i:1519988166;'),('88gk70vvupsdcg296mddk6oqh3i7tin2','10.240.0.87',1519990293,'__ci_last_regenerate|i:1519990293;'),('89d81s5t7kmr1ap5a7a5fr3vjse1ev5g','10.240.0.88',1519987051,'__ci_last_regenerate|i:1519987051;'),('89k2igmnbu3b6097c45tkjikgheg2tl4','10.240.0.185',1519990518,'__ci_last_regenerate|i:1519990518;'),('89qbl0ndhoe7sq1ar2d1rtevpsimmc22','10.240.1.220',1519987306,'__ci_last_regenerate|i:1519987306;'),('8cl13mqtjanibbftbqoi5gsaf1rfcapm','10.240.1.220',1519987226,'__ci_last_regenerate|i:1519987226;'),('8d2pasgqgplhg4ql3tgaejnle9sscair','10.240.0.88',1519986771,'__ci_last_regenerate|i:1519986771;'),('8dkbj86v28126b06rcqqc4eaviff1cc5','10.240.1.220',1519986730,'__ci_last_regenerate|i:1519986730;'),('8g9292eruca7lra6mek052eaf212u6nq','10.240.0.90',1519988497,'__ci_last_regenerate|i:1519988497;'),('8k0md9cltc28kisbivcoh65qqlm5fni1','10.240.1.220',1519990188,'__ci_last_regenerate|i:1519990188;'),('8k855898gggrfo47dnh9klar1euddch6','10.240.0.185',1519986760,'__ci_last_regenerate|i:1519986760;'),('8m49hur731ik22aklet2tmumalbads98','10.240.0.87',1519986955,'__ci_last_regenerate|i:1519986955;'),('8npe6fco7mpnl7lnii4u50h70bvh24vb','10.240.1.220',1519990128,'__ci_last_regenerate|i:1519990128;'),('8q4nkfmnmdu7hmr6r9t6g8u99ikaj407','10.240.0.88',1519989748,'__ci_last_regenerate|i:1519989748;'),('8q7srlkcaaggs4omvbc1s4ked5dkmqsg','10.240.0.90',1519989863,'__ci_last_regenerate|i:1519989863;'),('8qrea62nq98fien1mkq5hbo3lq73vcef','10.240.1.97',1519990503,'__ci_last_regenerate|i:1519990503;'),('8r59t50p45bj19if0sqb86bcnmjcsr3e','10.240.0.239',1519988206,'__ci_last_regenerate|i:1519988206;'),('8t9mktiddia7v0gq6qk47epcot0uavvf','10.240.0.87',1519986945,'__ci_last_regenerate|i:1519986945;'),('8ubl8brpvopkaqmmph30p8795b19okke','10.240.1.220',1519987846,'__ci_last_regenerate|i:1519987846;'),('8v8iohg14keksemf8gti8ulvbprgvti6','10.240.1.0',1519989663,'__ci_last_regenerate|i:1519989663;'),('8vp8pgap6i3hnngeftvkmfbdprpe9srh','10.240.1.220',1519988832,'__ci_last_regenerate|i:1519988832;'),('90jt3nckoudddit86o87tsaucsjg9spl','10.240.0.222',1519987476,'__ci_last_regenerate|i:1519987476;'),('90tthi9j86li5k44fhcl63bv88pela4t','10.240.0.187',1519989517,'__ci_last_regenerate|i:1519989517;'),('91p6vd9bo25uosrscm7it0a3kd6hhdqc','10.240.0.87',1519988682,'__ci_last_regenerate|i:1519988682;'),('92o5reg9245pc3vfpl6kpq803ia3ccfe','10.240.1.97',1519989573,'__ci_last_regenerate|i:1519989572;'),('92sju4v500ehf8negrgfqjinlu2nngae','10.240.0.87',1519989298,'__ci_last_regenerate|i:1519989298;'),('968rv5fg1ng9qn9ifs5k9aceejkuvmv4','10.240.0.87',1519989398,'__ci_last_regenerate|i:1519989398;'),('97jkd8cg9pvnth18c26n2gkm0jgh0dvt','10.240.0.88',1519989948,'__ci_last_regenerate|i:1519989948;'),('97m25qqd7vbvjbpqpf8u7go230q7mgqv','10.240.0.88',1519989032,'__ci_last_regenerate|i:1519989032;'),('97vgs1j18guq5pkp1q0qps08qk6qlint','10.240.0.90',1519989278,'__ci_last_regenerate|i:1519989278;'),('98h5pnob4qaid3b3i6vbkcs6h8sjs0cs','10.240.1.97',1519989057,'__ci_last_regenerate|i:1519989057;'),('98u2akn3jjl9391qg8kqlemfpahq51m1','10.240.1.97',1519986600,'__ci_last_regenerate|i:1519986600;'),('99nd4ljg1qv1h2qbfes38rflnhf0vf5j','10.240.1.99',1519990683,'__ci_last_regenerate|i:1519990683;'),('9bl5ar3lf6m3codllopi84qji6kpuagf','10.240.0.185',1519989367,'__ci_last_regenerate|i:1519989367;'),('9d2qc5eak62oc6ofj5d4qapksj0bjr6e','10.240.1.0',1519988211,'__ci_last_regenerate|i:1519988211;'),('9da1huqhk8q07lnc38ddtbgt1vntr14f','10.240.0.222',1519988151,'__ci_last_regenerate|i:1519988151;'),('9daala615vrsfdqqfmpk9ge8dsdcfq3j','10.240.0.88',1519986591,'__ci_last_regenerate|i:1519986591;'),('9ej1b0d9i9in07dvf2rnj8uir1d720ir','10.240.1.0',1519988426,'__ci_last_regenerate|i:1519988426;'),('9fq6fpcahc8dinlqss33pc1ssmtne8qq','10.240.1.97',1519989477,'__ci_last_regenerate|i:1519989477;'),('9fttbcg0567njqdi0to2pqo5vvjtbjhd','10.240.0.87',1519987806,'__ci_last_regenerate|i:1519987806;'),('9g6e9sda0o29nlb6ed1ic8r3omub157u','10.240.1.97',1519987251,'__ci_last_regenerate|i:1519987251;'),('9g8jap2l8201pl2o1a1uu5glpr1vf150','10.240.0.87',1519989692,'__ci_last_regenerate|i:1519989692;'),('9gio25miamj3aoooe1a87bnv92ho8brp','10.240.1.0',1519988537,'__ci_last_regenerate|i:1519988537;'),('9greqk69f6e91l8nd54ei88l6cvtblpf','10.240.1.0',1519988872,'__ci_last_regenerate|i:1519988872;'),('9hhq40de6k969cf2h57e9bptdsc9na7b','10.240.1.0',1519988782,'__ci_last_regenerate|i:1519988782;'),('9hmmhts34f9uge743frfmg8l7j3dhnqe','10.240.0.87',1519989627,'__ci_last_regenerate|i:1519989627;'),('9jkv3d1gm7g6fnr7ml6cslagqlb5g8nv','10.240.0.88',1519989228,'__ci_last_regenerate|i:1519989228;'),('9kf2bbpa1h7t4io5tmv18koc0imhjmup','10.240.1.99',1519987626,'__ci_last_regenerate|i:1519987626;'),('9lo6s0946522edhjdbeh0u93qriqe3mc','10.240.0.222',1519986470,'__ci_last_regenerate|i:1519986470;'),('9mg6so53qcpjseuvb249tnj68oujpi6a','10.240.0.87',1519986565,'__ci_last_regenerate|i:1519986565;'),('9mudc7gg04jobpmufqi4dbllqei9u29b','10.240.1.99',1519986490,'__ci_last_regenerate|i:1519986490;'),('9oprcmibdit2g6b8b7i9ssuoa8vor1qh','10.240.0.227',1519988577,'__ci_last_regenerate|i:1519988577;'),('9p2uhmo2fvuohp4kecfbv6u2qubvj4k8','10.240.0.87',1519987676,'__ci_last_regenerate|i:1519987676;'),('9tabk4pdlkguj9k13jabjaukh36pc1f4','10.240.1.220',1519987511,'__ci_last_regenerate|i:1519987511;'),('9v3pinu3o549p4iqkkkmu5asuss4uks5','10.240.0.90',1519989768,'__ci_last_regenerate|i:1519989768;'),('9vjgm4qv59o3jsgmg16phvdsclhctuft','10.240.0.227',1519988597,'__ci_last_regenerate|i:1519988597;'),('a0i6m2qmuneu8i1d62402us32e1qk5p6','10.240.1.220',1519990598,'__ci_last_regenerate|i:1519990598;'),('a10fsh8hlkii382eo0q6ftj0gkt1t759','10.240.0.87',1519986881,'__ci_last_regenerate|i:1519986881;'),('a2va22j7a4cuq37lrfgj7aapop8ll3ln','10.240.1.0',1519989648,'__ci_last_regenerate|i:1519989648;'),('a365oiur12jejs3okd033q50ltvslupj','10.240.1.0',1519988126,'__ci_last_regenerate|i:1519988126;'),('a39t14qi8302495souh10t87dp7efmgk','10.240.0.187',1519987286,'__ci_last_regenerate|i:1519987285;'),('a4pf8vh8lfv99eoi8f4mmg24fkqa9nqa','10.240.1.220',1519988957,'__ci_last_regenerate|i:1519988957;'),('a5tk94pas6lrvm3djk3m7ulnk9mvrkmk','10.240.0.187',1519989788,'__ci_last_regenerate|i:1519989788;'),('aak3ubm69jdj1oe5mcr4nscvcd8ufaqs','10.240.0.88',1519989743,'__ci_last_regenerate|i:1519989743;'),('aat3q8eod8c6nkafc6l1ud0ka8jripjk','10.240.1.0',1519988026,'__ci_last_regenerate|i:1519988026;'),('ab8mi6fmsgg0tgnpkiofbe5kv602g0v2','10.240.1.220',1519988808,'__ci_last_regenerate|i:1519988808;'),('accru5s8jp6rp2av3cctafp034f1p3i2','10.240.1.0',1519989167,'__ci_last_regenerate|i:1519989167;'),('ada5ffoh3p2hjp6gknkca8ro4nmldpqs','10.240.0.222',1519987501,'__ci_last_regenerate|i:1519987501;'),('adbsncohjkiadi71cta6um9egnjpj8ia','10.240.0.222',1519986595,'__ci_last_regenerate|i:1519986595;'),('ae2if39mj1im1rlu873012bmslslfro6','10.240.0.88',1519986735,'__ci_last_regenerate|i:1519986735;'),('aghqnohmvucd7cd2g57d8t35str9247u','10.240.0.222',1519989232,'__ci_last_regenerate|i:1519989232;'),('aharp2uqdp1h7dqk6franisu40ji150a','10.240.0.88',1519990713,'__ci_last_regenerate|i:1519990713;'),('ahi0qfmg0hp39kpieuous1pccmi5do87','10.240.1.220',1519986460,'__ci_last_regenerate|i:1519986460;'),('ajvr6f8c5pjctmkf3e0tvstccc07k3au','10.240.0.185',1519989598,'__ci_last_regenerate|i:1519989598;'),('alrouhv2o05oa5q2dk5fo0sgjqvj2273','10.240.0.88',1519988337,'__ci_last_regenerate|i:1519988337;'),('am1ukmde8ig7kes79807pqu5c97a6kt8','10.240.1.189',1519987661,'__ci_last_regenerate|i:1519987661;'),('an0h3nut1t314lm2at6sgtgbc4heeq0c','10.240.1.0',1519988296,'__ci_last_regenerate|i:1519988296;'),('an0suo47ncmkqnifol4li2jpjtrletgq','10.240.1.220',1519987330,'__ci_last_regenerate|i:1519987330;'),('ao1bsm41m24ts2v6imgpbfq010g73jlk','10.240.1.189',1519990198,'__ci_last_regenerate|i:1519990198;'),('ao33fpmskd15o3quo7qifri96pl7aceg','10.240.0.88',1519989953,'__ci_last_regenerate|i:1519989953;'),('ape7khpospf65dflujukndafmmf58slo','10.240.1.189',1519990663,'__ci_last_regenerate|i:1519990663;'),('apjv110vf73prgnfndmmstnmmsgi5aqp','10.240.1.0',1519988777,'__ci_last_regenerate|i:1519988777;'),('aqipfg1ic0hudjlr8endi8nsibeoombj','10.240.0.185',1519987140,'__ci_last_regenerate|i:1519987140;'),('arkojpiabk6t3t6vpbkm1k93tkcu0hiq','10.240.0.222',1519989553,'__ci_last_regenerate|i:1519989553;'),('arlgrp5cqheu75h9giq4epeks75vb21d','10.240.0.87',1519986561,'__ci_last_regenerate|i:1519986561;'),('au0thuvsvh1jsjlqbmjgencc0fmi446a','10.240.1.0',1519989698,'__ci_last_regenerate|i:1519989698;'),('aup1gdjkujtsa729baalk56kqjb6330a','10.240.0.87',1519986526,'__ci_last_regenerate|i:1519986526;'),('av3mci78i41315cchogpjc7tstmgdpvs','10.240.1.0',1519988406,'__ci_last_regenerate|i:1519988406;'),('b289krad6br2dkerro9pa8jmdbvstvde','10.240.0.222',1519988487,'__ci_last_regenerate|i:1519988487;'),('b3gm10qnc5pf3ck5ajhhu4n44e0ptl0f','10.240.0.88',1519987240,'__ci_last_regenerate|i:1519987240;'),('b4c55ahr3ke9up5e085i3hukbhl7tub5','10.240.1.189',1519989593,'__ci_last_regenerate|i:1519989593;'),('b4q2fnaevbomhqv63i634mefcd91rb5i','10.240.0.187',1519990423,'__ci_last_regenerate|i:1519990423;'),('b7219b1vtcksermuf6ut8vr926vqaad5','10.240.1.189',1519987426,'__ci_last_regenerate|i:1519987426;'),('b8bfr2oqurd6j9vkqkma3ik4d3p11r0t','10.240.0.187',1519987211,'__ci_last_regenerate|i:1519987211;'),('b9dpn4hi3qhsnm4c3ql4bphaje2r9n9s','10.240.1.97',1519986941,'__ci_last_regenerate|i:1519986941;'),('bac51nv1vv48sv8s4e3420qfv4fdse65','10.240.1.220',1519987461,'__ci_last_regenerate|i:1519987461;'),('bbnv4keo2g31ujr67or378a5ptfelijt','10.240.1.99',1519990703,'__ci_last_regenerate|i:1519990703;'),('bcovoj4pk53e6aubrvt490kqvvpvo5q0','10.240.1.0',1519988672,'__ci_last_regenerate|i:1519988672;'),('bcuj7dbiaruc196agcj303j379lf1ciq','10.240.1.0',1519988767,'__ci_last_regenerate|i:1519988767;'),('bdqkg3k001b386bbk4v3sto763bs3kdp','10.240.1.0',1519988086,'__ci_last_regenerate|i:1519988086;'),('bebjld803bg9hi7rd2ta7ddagsrdq3bu','10.240.0.88',1519989608,'__ci_last_regenerate|i:1519989608;'),('bedios16vrl66rfqtkjrncrl8b1u2j1j','10.240.1.0',1519988041,'__ci_last_regenerate|i:1519988041;'),('bfha4iop0ard5s3535ctm96oug2mp28q','10.240.1.0',1519989913,'__ci_last_regenerate|i:1519989913;'),('bg1hukhllivumohn6ikprpkf48u2cf3v','10.240.1.97',1519987801,'__ci_last_regenerate|i:1519987801;'),('bgdaocquuc9geave3j28nf6sho5fdea7','10.240.1.189',1519989387,'__ci_last_regenerate|i:1519989387;'),('bgmumkt9s8f1275b1o9a9us4m43em0pl','10.240.1.99',1519987456,'__ci_last_regenerate|i:1519987456;'),('bh2ml4jglsa7p81baagurt18kisvs5c4','10.240.0.185',1519989392,'__ci_last_regenerate|i:1519989392;'),('bkajr0ijohj40pohkh7lddpco2iv9vpo','10.240.0.222',1519987816,'__ci_last_regenerate|i:1519987816;'),('boj870h9tf9o7d43drj3aeq8p2g4rcjm','10.240.0.185',1519987015,'__ci_last_regenerate|i:1519987015;'),('bp6fh0cfmnabk4h7ak8fakl4inkr2ah7','10.240.0.239',1519986575,'__ci_last_regenerate|i:1519986575;'),('bp7coi59pb4l3umf7uc4i626gcbb4f47','10.240.1.97',1519986666,'__ci_last_regenerate|i:1519986666;'),('bp7dsumqt9e6hg40vls8hjeigaj4qh5r','10.240.0.222',1519987821,'__ci_last_regenerate|i:1519987821;'),('bvjmd5kk509js14m8fq469ritfpu461v','10.240.0.87',1519990233,'__ci_last_regenerate|i:1519990233;'),('c3ad845fi8kr73ef7f5gj8gkprbj12h2','10.240.0.227',1519987136,'__ci_last_regenerate|i:1519987136;'),('c46sa3v1445a92uo36be11meel07ob93','10.240.1.0',1519988096,'__ci_last_regenerate|i:1519988096;'),('c59ird9vbk2ndb11casr38se1qvhk3fb','10.240.0.227',1519989158,'__ci_last_regenerate|i:1519989158;'),('c8200abli3s63laj6kvpbdubdm93mrun','10.240.1.0',1519988877,'__ci_last_regenerate|i:1519988877;'),('c8msa8svchum55ajj06g3our0dlkt0j3','10.240.0.87',1519987826,'__ci_last_regenerate|i:1519987826;'),('c91inqmink0aivqul17ets2cs839a77o','10.240.1.99',1519990324,'__ci_last_regenerate|i:1519990324;'),('c945m7g38ue1ph7nkr5n1tjchenrvhon','10.240.1.0',1519987981,'__ci_last_regenerate|i:1519987981;'),('cao67hd492jj6otb8c0l9q29fs0cl788','10.240.1.99',1519989562,'__ci_last_regenerate|i:1519989562;'),('casssqe95nqmq389dh4hhfbg8qnhi5pt','10.240.0.87',1519987205,'__ci_last_regenerate|i:1519987205;'),('cc7j43s4a6tl574qkknsq501gihpd6e6','10.240.0.222',1519989993,'__ci_last_regenerate|i:1519989993;'),('cccqbe9rkdaeoj7immgdh625mfcpnkvv','10.240.1.220',1519989348,'__ci_last_regenerate|i:1519989348;'),('cgbbu2o7lorjlnsjpe4l32bktuhkono9','10.240.0.222',1519989237,'__ci_last_regenerate|i:1519989237;'),('cgbntcojkqn5ol81fddvl9vfq5c1bpqf','10.240.1.97',1519987931,'__ci_last_regenerate|i:1519987931;'),('cgtpmbprduagrhtauqq97jifpavkeetk','10.240.0.185',1519989372,'__ci_last_regenerate|i:1519989372;'),('chdv52ih18kpi1qsfnc10m0c8vd9gov2','10.240.1.220',1519990479,'__ci_last_regenerate|i:1519990479;'),('cijmbe35dop558pdsf69jibdofufg8kk','10.240.0.239',1519987516,'__ci_last_regenerate|i:1519987516;'),('cm1rg7m60b3iaf50i85nfhtsdvas1ioj','10.240.0.222',1519990588,'__ci_last_regenerate|i:1519990588;'),('coe19o6h46rkpmv4anic5i1lfh1alvug','10.240.0.187',1519989658,'__ci_last_regenerate|i:1519989658;'),('com3000f8nmoqq4jv7ti3lhkkft5mn0r','10.240.0.222',1519990208,'__ci_last_regenerate|i:1519990208;'),('cq1hjbfmiagoigccbnb145dm7951vtbb','10.240.0.222',1519990442,'__ci_last_regenerate|i:1519990442;'),('cr6jmubs4m8coid1hvet0usi2upsqr9b','10.240.0.222',1519990523,'__ci_last_regenerate|i:1519990523;'),('cuc15u4q1gi6skun82r67nnihtrmlm4c','10.240.0.222',1519987601,'__ci_last_regenerate|i:1519987601;'),('cudfqhqgcupgd7jti2pujk1m5i7ds2mg','10.240.1.0',1519988341,'__ci_last_regenerate|i:1519988341;'),('curnuag99rj55r0fl2d0irp9nc71567k','10.240.1.0',1519988747,'__ci_last_regenerate|i:1519988747;'),('cvfglcssct8s82i2m66s04v76htc08l0','10.240.1.99',1519986625,'__ci_last_regenerate|i:1519986625;'),('d21qctjd4c45s4l9cvt84qpgvc01kuns','10.240.1.0',1519989177,'__ci_last_regenerate|i:1519989177;'),('d5r026oo50m9o038i86ltr4l2decfhv2','10.240.0.222',1519990263,'__ci_last_regenerate|i:1519990263;'),('d91905desbnjjrifaqqgfft6ue5oskd0','10.240.0.87',1519989407,'__ci_last_regenerate|i:1519989407;'),('d9m0t6rfnm2ltshj7rj2b478h85i16k9','10.240.1.97',1519987275,'__ci_last_regenerate|i:1519987275;'),('da4of0l95802a7i6d86k6so4e6bo4b7d','10.240.0.222',1519990693,'__ci_last_regenerate|i:1519990693;'),('dad4kipp45pgpuiud2skvo5re28vtiq3','10.240.0.222',1519987874,'__ci_last_regenerate|i:1519987874;'),('dau5jluije9v089qpkmnqtc69lmg3v05','10.240.1.0',1519988907,'__ci_last_regenerate|i:1519988907;'),('dc81m7k1bocbpi0eflvndeaum142va5l','10.240.0.87',1519986905,'__ci_last_regenerate|i:1519986905;'),('dee2fp7ah0pi0tecf261sfctlr8uqh7g','10.240.1.220',1519987441,'__ci_last_regenerate|i:1519987441;'),('demndfke5kaqs8id9p8rv5lcm3h833t9','10.240.0.90',1519988637,'__ci_last_regenerate|i:1519988637;'),('dg68bscq4rqcsr8gpt2phr1k8uo5c790','10.240.0.90',1519990479,'__ci_last_regenerate|i:1519990479;'),('dhg9q82uiggj2el2ot7p6o5e1o51fjo6','10.240.0.90',1519990738,'__ci_last_regenerate|i:1519990738;'),('dj3c6750r20ilanc1i8j1vrh7udo1dgl','10.240.0.222',1519987671,'__ci_last_regenerate|i:1519987671;'),('dmn5kdaast2tqckr548hrlnk53o0nf08','10.240.0.185',1519989512,'__ci_last_regenerate|i:1519989512;'),('dn2ge9t35fej13774ubl7sj5f7fsdnv9','10.240.0.88',1519987091,'__ci_last_regenerate|i:1519987091;'),('dqui9vatrh5eibek6q1d1c7apkr3fov6','10.240.0.90',1519989848,'__ci_last_regenerate|i:1519989848;'),('drdhve91qc9trioh52v558prdi7qhvgr','10.240.1.0',1519988792,'__ci_last_regenerate|i:1519988792;'),('drnp8rmhl5trcjespcq2p05gm4skdm87','10.240.1.99',1519986449,'__ci_last_regenerate|i:1519986449;'),('dtgqkbqgh345sh2grh9jglo47fk01v7i','10.240.1.0',1519988892,'__ci_last_regenerate|i:1519988892;'),('duhgaekgip0rb65o0oe9veepcr10cjs2','10.240.0.239',1519987874,'__ci_last_regenerate|i:1519987874;'),('dvans2e8agaofoqqlb9oclkfflpvtceg','10.240.1.0',1519986981,'__ci_last_regenerate|i:1519986981;'),('e0dnesfbmnkhc2tsdh4psvgaj2nb9ido','10.240.0.187',1519987792,'__ci_last_regenerate|i:1519987792;'),('e1f07u9s149d5rlrsetvlngti3ssv9ge','10.240.0.222',1519987792,'__ci_last_regenerate|i:1519987792;'),('e27tcnagbhhd609jckfk9q3s0gctili9','10.240.1.0',1519988802,'__ci_last_regenerate|i:1519988802;'),('e37v6hpbq9cet77429rantcfomr4qqc9','10.240.0.222',1519986696,'__ci_last_regenerate|i:1519986696;'),('e5nlo8of5gab42ggkc7kl795qvcfbag0','10.240.1.189',1519989492,'__ci_last_regenerate|i:1519989492;'),('e6slmpdmsdehb6cegddt7e04f8i73hl5','10.240.1.97',1519988472,'__ci_last_regenerate|i:1519988472;'),('e73lns0f9pqu2deo4tnvndbg15fj1dio','10.240.1.0',1519988006,'__ci_last_regenerate|i:1519988006;'),('e7jidqm8tmschcrif2t3svp256e6hs4f','10.240.1.99',1519990103,'__ci_last_regenerate|i:1519990103;'),('e9skkllk4biski9puvurvuf3j7vdnkoc','10.240.1.0',1519988492,'__ci_last_regenerate|i:1519988492;'),('eaid84v6mi6fetlbso8v559g0ce7sdjd','10.240.0.87',1519988942,'__ci_last_regenerate|i:1519988942;'),('ebm43phoa29tfmal3ouoln8mlnqrs3gb','10.240.0.185',1519988898,'__ci_last_regenerate|i:1519988898;'),('ecqmr6pcao7mrcbnvn0fabv7pvjcr25h','10.240.1.97',1519990088,'__ci_last_regenerate|i:1519990088;'),('ecv9v6fdb68rjb19if37u21tnlin0bnq','10.240.0.227',1519986645,'__ci_last_regenerate|i:1519986645;'),('ee4c7mnkummfi8e64jf2qu282o087cns','10.240.0.87',1519989637,'__ci_last_regenerate|i:1519989637;'),('eeo7l31es9sujkg61mrfhet2qes22gs4','10.240.0.185',1519986856,'__ci_last_regenerate|i:1519986856;'),('ef5fulvja7qoiivk9vmca8djlo27uqi9','10.240.1.189',1519989383,'__ci_last_regenerate|i:1519989383;'),('eidlv74t02e54oid005rdrcnkvu2m91c','10.240.1.97',1519986806,'__ci_last_regenerate|i:1519986806;'),('ekkt5ji8mdinbm1pnddsss3jmvl3jfk0','10.240.0.87',1519988186,'__ci_last_regenerate|i:1519988186;'),('elnh7nrrs05jvf9fm76n19ied3clkkmo','10.240.1.0',1519989162,'__ci_last_regenerate|i:1519989162;'),('emad3f4031n8t0o18d4qq2l8rsl91n33','10.240.1.0',1519988762,'__ci_last_regenerate|i:1519988762;'),('eoop97sd0gdrjlqvoi0cu79tuvfn7uip','10.240.0.239',1519987566,'__ci_last_regenerate|i:1519987566;'),('ep9src7kebv64jk2liebue0gbt7a35bj','10.240.0.222',1519987471,'__ci_last_regenerate|i:1519987471;'),('epn0k5v2na5hgfu9r2sn09mrfp61j9d2','10.240.1.0',1519988011,'__ci_last_regenerate|i:1519988011;'),('es869avo21kf6otn6jbbe2u3708g4tut','10.240.1.99',1519990479,'__ci_last_regenerate|i:1519990479;'),('esjarlcr774jp9kglr19vris45pd6oe6','10.240.1.97',1519990178,'__ci_last_regenerate|i:1519990178;'),('esnbka52slk3mo52vt38j92st23tgvsd','10.240.1.220',1519989138,'__ci_last_regenerate|i:1519989138;'),('etd7ueoi3eipdj9lupii4tbnn4h6ve4i','10.240.0.227',1519986745,'__ci_last_regenerate|i:1519986745;'),('ev2gahf1raev1jalq5h5be93u3gril79','10.240.1.97',1519987280,'__ci_last_regenerate|i:1519987280;'),('evdba5ikf3sva6frmsaspv331124i9jt','10.240.0.227',1519988617,'__ci_last_regenerate|i:1519988617;'),('f130704n6eme5gii9ilnbkvpilgirc8g','10.240.0.239',1519986835,'__ci_last_regenerate|i:1519986835;'),('f1lslolqr37lr71mjc3lbv8tkqos8fho','10.240.0.88',1519989903,'__ci_last_regenerate|i:1519989903;'),('f2hgm8ki7osqbnsngm226som7p8bma8u','10.240.0.87',1519989437,'__ci_last_regenerate|i:1519989437;'),('f4cl5sbr94ppfvvm5n4kqsqjo7c4p799','10.240.0.185',1519989507,'__ci_last_regenerate|i:1519989507;'),('f89r3hnruce6eqknlevf14sa1lb5nhsf','10.240.1.97',1519990253,'__ci_last_regenerate|i:1519990253;'),('f8cpt631v357q6kisravq4jkedj4npcb','10.240.0.185',1519989097,'__ci_last_regenerate|i:1519989097;'),('f8ie4h6djjlcdqq1vid652dijch1qivh','10.240.1.220',1519987621,'__ci_last_regenerate|i:1519987621;'),('f903o5jq6iel07fg86ntpljcvhs5saj5','10.240.0.87',1519986786,'__ci_last_regenerate|i:1519986786;'),('f93h0fjb0sonh0m2ekdvn20m5kuhgibp','10.240.0.187',1519989473,'__ci_last_regenerate|i:1519989473;'),('f9bm50vgqqi1rvemncudvjav5t5eguvq','10.240.1.99',1519989968,'__ci_last_regenerate|i:1519989968;'),('f9jiq7f987kvua7l8dl4fqqb9on2kmmj','10.240.0.227',1519989833,'__ci_last_regenerate|i:1519989833;'),('fad9qbke1a0uvbflrctsv7414ncj86uc','10.240.1.99',1519986485,'__ci_last_regenerate|i:1519986485;'),('ffhaibc6hgm4ro3c72mmv61njutur6fc','10.240.0.90',1519986650,'__ci_last_regenerate|i:1519986650;'),('fhhugvm43u1g0ntmh4o9flmuh2aeqpfv','10.240.1.97',1519989558,'__ci_last_regenerate|i:1519989558;'),('fj7p4t6slq5oh7jomp1h1083j43m10tn','10.240.0.239',1519987486,'__ci_last_regenerate|i:1519987486;'),('flnh0sdrmlk2fdb191v38vvl4elnpntb','10.240.1.0',1519988101,'__ci_last_regenerate|i:1519988101;'),('fm6j5o2spvs7v1ecmd4fj1r0b0q3149h','10.240.0.88',1519986686,'__ci_last_regenerate|i:1519986686;'),('fn01scdn4sp143rfhh0dd75l38d03avd','10.240.0.88',1519987085,'__ci_last_regenerate|i:1519987085;'),('foti7qipuknjobds8o0nj6e4gr20to1d','10.240.0.222',1519990008,'__ci_last_regenerate|i:1519990008;'),('fq18r1gccsfdvbkrc9g5plta4v6shb4t','10.240.1.0',1519988111,'__ci_last_regenerate|i:1519988111;'),('fq2njpgmbrslciklr4ulo56it6leo9bu','10.240.1.0',1519989858,'__ci_last_regenerate|i:1519989858;'),('fr8n4v8tap7kki4upqh9qmsroatsnojr','10.240.1.0',1519988276,'__ci_last_regenerate|i:1519988276;'),('frq2c01pf1q3mm30a318fii82h5nik6q','10.240.1.220',1519987874,'__ci_last_regenerate|i:1519987874;'),('fufk23ded4fskigm1lkq0f2cb3jso1bg','10.240.0.187',1519986861,'__ci_last_regenerate|i:1519986861;'),('fuma73faa7t42vk1op6o3f4a7i6p8m95','10.240.0.87',1519987531,'__ci_last_regenerate|i:1519987531;'),('fvpdjfs9qum2i3b74defrdktq7h91u34','10.240.1.99',1519990673,'__ci_last_regenerate|i:1519990673;'),('g0ce9fch3aucna0l6hb2d5f50417tlh6','10.240.1.220',1519987737,'__ci_last_regenerate|i:1519987737;'),('g0mhh52er72to3lil74gv7mqotpltvmc','10.240.0.187',1519988517,'__ci_last_regenerate|i:1519988517;'),('g1tf23cbn08j5p3tjrppk3dsop803aoi','10.240.1.220',1519989803,'__ci_last_regenerate|i:1519989803;'),('g40ib790hm77a1g1mcgv5f2qe9ni2gf9','10.240.0.185',1519990528,'__ci_last_regenerate|i:1519990528;'),('g7gu33a4lg4ap94t3mp51igtibtsg49h','10.240.1.0',1519988391,'__ci_last_regenerate|i:1519988391;'),('gd7lebb9t0nfblm083oboq1p6ajr6kbe','10.240.0.222',1519989688,'__ci_last_regenerate|i:1519989688;'),('gd9av8jfr1pvf1oisbo838m3klqg5sch','10.240.1.220',1519988913,'__ci_last_regenerate|i:1519988913;'),('gdj60gotrtefmqidroic0e4vkulsi5ru','10.240.1.99',1519986580,'__ci_last_regenerate|i:1519986580;'),('ge645en3o10i3jiqeam25mjdj0gjftf8','10.240.0.87',1519989853,'__ci_last_regenerate|i:1519989853;'),('gffbp2anjkf85ebih2k0b4k8ndvr4d9p','10.240.1.189',1519990158,'__ci_last_regenerate|i:1519990158;'),('ggc120kpr5v9mujoei7hma6j1t02k299','10.240.0.88',1519990078,'__ci_last_regenerate|i:1519990078;'),('ghe133iabbbll3qs4n4qj11jhnl93rge','10.240.1.0',1519988071,'__ci_last_regenerate|i:1519988071;'),('ghnt8tmpiq6mbo2t545bkg6pgsf4cg1n','10.240.1.0',1519989703,'__ci_last_regenerate|i:1519989703;'),('gj5gvg0slgi6m8ep99u5fv3af0614bb8','10.240.0.187',1519990358,'__ci_last_regenerate|i:1519990358;'),('gkftb2rkfrh6rgbupkta4ae6d1ofg5uf','10.240.0.187',1519989128,'__ci_last_regenerate|i:1519989128;'),('glakoqpv0ji614b1iqelclvnes7feeak','10.240.1.97',1519986900,'__ci_last_regenerate|i:1519986900;'),('gllicfon738b0qv0rqcg79akrv07932q','10.240.0.87',1519988221,'__ci_last_regenerate|i:1519988221;'),('glt3lpebkct6ommcved7kve0pbvrli5c','10.240.0.90',1519989728,'__ci_last_regenerate|i:1519989728;'),('gnevosdsf3stkj4truh4ficgndcrvjij','10.240.0.88',1519986606,'__ci_last_regenerate|i:1519986606;'),('go5vlluri4ui95j7kvl67eugkduifb66','10.240.0.187',1519986851,'__ci_last_regenerate|i:1519986851;'),('gorqda4foh59ni3nj1ph9198p39q165k','10.240.1.189',1519990653,'__ci_last_regenerate|i:1519990653;'),('govlr7343dcue73unkmjga6bdok072hd','10.240.0.87',1519990388,'__ci_last_regenerate|i:1519990388;'),('gqo3hcqnraedott5sj3gjdo7nnh66ov9','10.240.1.220',1519987040,'__ci_last_regenerate|i:1519987040;'),('gtrviu18ru5cg27co9l3mcus0f71qr3g','10.240.1.220',1519986710,'__ci_last_regenerate|i:1519986710;'),('gu0chrbjeiaun0n6u0srf9ttst0h1iov','10.240.0.227',1519987951,'__ci_last_regenerate|i:1519987951;'),('gu2e95qs6vj88o4apr6femt8kqnikbuj','10.240.0.222',1519990138,'__ci_last_regenerate|i:1519990138;'),('gue8ri411efr36j87qdbfif31odidurc','10.240.0.90',1519986676,'__ci_last_regenerate|i:1519986676;'),('h0l27r622k9lm6alq12u6i1fg531kg26','10.240.1.97',1519987556,'__ci_last_regenerate|i:1519987556;'),('h1205gc3jhc14diqqsk9vbddbuas5kbr','10.240.0.87',1519986895,'__ci_last_regenerate|i:1519986895;'),('h20ekue6ovqgd7bbr9du3gh0cp8jpeeo','10.240.0.90',1519988462,'__ci_last_regenerate|i:1519988462;'),('h2rrfde3jad2hmqn5jtk7v6kd0q37lcp','10.240.1.189',1519990118,'__ci_last_regenerate|i:1519990118;'),('h5sqong35vsmm9aggi92llnpqtn2bq0v','10.240.0.239',1519988522,'__ci_last_regenerate|i:1519988522;'),('h6khg2sas4uia169fbgjnditcb9aa3p9','10.240.0.222',1519987656,'__ci_last_regenerate|i:1519987656;'),('h91qeoer308eql2d7786jqvade3ev2rt','10.240.1.97',1519986840,'__ci_last_regenerate|i:1519986840;'),('hadq6dh3cddvf3ebb2aio7lo2ubqmhqg','10.240.0.187',1519987095,'__ci_last_regenerate|i:1519987095;'),('he7bch1pjfsgcb1nhv4lhkc69rmf4l4c','10.240.1.189',1519990238,'__ci_last_regenerate|i:1519990238;'),('hee2o07ac6q4mjc1g9s822cauobt1eee','10.240.0.222',1519988562,'__ci_last_regenerate|i:1519988562;'),('hf78pdtjl7lvaf2vrj555bt50280uu2h','10.240.1.220',1519986630,'__ci_last_regenerate|i:1519986630;'),('hgq98andau9ttlbkhtc2774ah1ckjadd','10.240.1.99',1519987581,'__ci_last_regenerate|i:1519987581;'),('hi99cajilb8lmbri1r0ld572q7h9l2po','10.240.0.222',1519988667,'__ci_last_regenerate|i:1519988667;'),('hjgoi4qqsbh4ie2r4fbu4cgb4dachlmo','10.240.1.0',1519988822,'__ci_last_regenerate|i:1519988822;'),('hlhj429bamnai826ekqem7uv52lpqrvu','10.240.0.222',1519987521,'__ci_last_regenerate|i:1519987521;'),('hp0737bab855hg6dj1nlofbamqded7mk','10.240.1.0',1519988557,'__ci_last_regenerate|i:1519988557;'),('hrv0uqgni79ovgb5gu1lpahovpj8shhl','10.240.1.0',1519989202,'__ci_last_regenerate|i:1519989202;'),('hu1t6ino68lbf57iiqm3amn69jb2u68r','10.240.1.189',1519989522,'__ci_last_regenerate|i:1519989522;'),('hvi4o5cfl6ejt76js4t9tape9i3693n7','10.240.1.220',1519989988,'__ci_last_regenerate|i:1519989988;'),('hvri4hk1r95svkivi27dvcvv54n0l7qi','10.240.0.227',1519989713,'__ci_last_regenerate|i:1519989713;'),('hvsmn1ljkdu8jpdau5mrjus4v0iddlfv','10.240.0.185',1519986610,'__ci_last_regenerate|i:1519986610;'),('i09tdou3oqrug7alqn6adaeo24mnr65o','10.240.1.0',1519988281,'__ci_last_regenerate|i:1519988281;'),('i0d5lgo71nlqgiladj3sb4rtdbe94p0v','10.240.1.99',1519987390,'__ci_last_regenerate|i:1519987390;'),('i1gv98j2ni4di6ojj407n7f72vdgjv4r','10.240.0.90',1519987020,'__ci_last_regenerate|i:1519987020;'),('i2hue56fvke5igjvqq3rp9auucn75u1o','10.240.1.97',1519987641,'__ci_last_regenerate|i:1519987641;'),('i63iduag3mcdn6pjip9mfa1taj1scq7k','10.240.0.88',1519987060,'__ci_last_regenerate|i:1519987060;'),('iad7rm5p89e7cmlv4k0udfdoqulqkvl4','10.240.0.227',1519986750,'__ci_last_regenerate|i:1519986750;'),('ic9e24ssv543k2etm837no52e55al2sg','10.240.0.239',1519990643,'__ci_last_regenerate|i:1519990643;'),('icqdnq33obrai7jj63r2t9offc8s6264','10.240.0.87',1519986971,'__ci_last_regenerate|i:1519986971;'),('iedadku6pqgav99p511dtoujtr07rvbr','10.240.0.187',1519986721,'__ci_last_regenerate|i:1519986721;'),('ifgob77t5l1ud3g195tf4l7sb8i6sfgc','10.240.0.187',1519990283,'__ci_last_regenerate|i:1519990283;'),('igmlg0pqbts103kh19qvb94qch65u2v7','10.240.1.189',1519987356,'__ci_last_regenerate|i:1519987356;'),('ihmntv3tl86cd19sha9f83obp9bluqpt','10.240.0.90',1519988507,'__ci_last_regenerate|i:1519988507;'),('ik8be1dei5ol5l0vhg50m0go9t4hl6m8','10.240.1.0',1519989327,'__ci_last_regenerate|i:1519989327;'),('im09dfut14vkr6bgp9s4ol1i3qgm92nr','10.240.0.222',1519990479,'__ci_last_regenerate|i:1519990479;'),('imduq97aj9so7v0dnet8lkfiqkp8d5jn','10.240.0.222',1519990608,'__ci_last_regenerate|i:1519990608;'),('inskm49i5nf03thplhls1uen10g2rt53','10.240.0.239',1519989718,'__ci_last_regenerate|i:1519989718;'),('ioi97bc7sa7ta0ds1549ufpa1mu92ege','10.240.0.222',1519988887,'__ci_last_regenerate|i:1519988887;'),('iotjb06igl457covc5t6tlu61rnv2t59','10.240.1.189',1519987996,'__ci_last_regenerate|i:1519987996;'),('iq52glmjpn43jmitaeu2ha7pmq7v3ou6','10.240.0.88',1519988191,'__ci_last_regenerate|i:1519988191;'),('ir90306349lbtuk7vgt6os6s6etkcshs','10.240.1.0',1519989758,'__ci_last_regenerate|i:1519989758;'),('iuebg0r6fui8poo2imeqk54192cjf8md','10.240.1.97',1519989878,'__ci_last_regenerate|i:1519989878;'),('iv36kpta60ber0r7pvr2n9of07ejqrkd','10.240.1.97',1519986911,'__ci_last_regenerate|i:1519986911;'),('ivlm18qqs732aakt03hnf52o7m51im72','10.240.0.90',1519990378,'__ci_last_regenerate|i:1519990378;'),('j0b8qo0qi9mgjblbapju2s45juvvkql1','10.240.0.239',1519989458,'__ci_last_regenerate|i:1519989458;'),('j4sjrdlc634p8r5rkqpk57lcfa7bcshl','10.240.1.97',1519990098,'__ci_last_regenerate|i:1519990098;'),('j59vngiav7olj4et4q7g17oo0ijnkd1k','10.240.0.87',1519989578,'__ci_last_regenerate|i:1519989578;'),('j72c8fsrf2guv9v8l7k492s7m2ehjtb1','10.240.1.220',1519990173,'__ci_last_regenerate|i:1519990173;'),('j74c7n1h0uno9j9f5iv1retjpo1a88ft','10.240.0.227',1519989112,'__ci_last_regenerate|i:1519989112;'),('j8nknmr0des80q3cvqmtn52cortf5buu','10.240.1.0',1519988532,'__ci_last_regenerate|i:1519988532;'),('j8v4qee7tb1urmou5u32mi0k4n5fq942','10.240.1.189',1519988818,'__ci_last_regenerate|i:1519988818;'),('j92ik2fjhtn25gcg2896c5dkmd6o9rcm','10.240.1.220',1519987571,'__ci_last_regenerate|i:1519987571;'),('j9bi1pedbejvgv16836a9m9a2omjh9vg','10.240.0.222',1519988567,'__ci_last_regenerate|i:1519988567;'),('jaiirra742963r27iqn7u7ljmokefge9','10.240.0.222',1519987221,'__ci_last_regenerate|i:1519987221;'),('jasttr0o36s4tnral3dlkkomkj54ku6r','10.240.0.88',1519990429,'__ci_last_regenerate|i:1519990429;'),('jc2nisjv7g3grvk9ftvnhkhsoau7o4b2','10.240.1.97',1519987916,'__ci_last_regenerate|i:1519987916;'),('jgd3u9dv94nfpqavp8t8qerughh6trnj','10.240.0.239',1519987591,'__ci_last_regenerate|i:1519987591;'),('jhgll76gicd598e3dvhbrftf6sk54549','10.240.0.187',1519988331,'__ci_last_regenerate|i:1519988331;'),('jhhmll8c3pqln1ec3tg2ocl6bn5qt4ti','10.240.1.189',1519989668,'__ci_last_regenerate|i:1519989668;'),('jht9eah29832vvjbe1dftsmrb1l46boa','10.240.0.90',1519987010,'__ci_last_regenerate|i:1519987010;'),('jiigb1sbicc7gppj4o10ogk30rbdnoee','10.240.1.0',1519989933,'__ci_last_regenerate|i:1519989933;'),('jk69opfej8t1gcfc9boas4o7e8icrvtn','10.240.0.222',1519987646,'__ci_last_regenerate|i:1519987646;'),('jlgaehvpe2nsld7derk6q02knqhhmdkg','10.240.1.99',1519989073,'__ci_last_regenerate|i:1519989073;'),('jlm8ainucrl963mkk5e3chvprb6n3t9s','10.240.0.90',1519989843,'__ci_last_regenerate|i:1519989843;'),('jme2hppncail02mbt8mlhrrddpecqpkp','10.240.0.187',1519987986,'__ci_last_regenerate|i:1519987986;'),('js3d6a8b9kqfkll47piq9ghi328b2b6c','10.240.1.189',1519989442,'__ci_last_regenerate|i:1519989442;'),('jtjdco18454im7vq44t373gjn7kc8i94','10.240.0.87',1519986512,'__ci_last_regenerate|i:1519986511;'),('jtnm9bblehr67rccg3sde1lnuod85da8','10.240.0.227',1519989012,'__ci_last_regenerate|i:1519989012;'),('jto2f9751pcn60la09d880konqnal8ci','10.240.1.0',1519988752,'__ci_last_regenerate|i:1519988752;'),('jtrign8p1pot4upk4ar4o9ofm094ipkr','10.240.1.220',1519988967,'__ci_last_regenerate|i:1519988967;'),('k0v1oral9pqfgos20pqc0evuku7p6a4i','10.240.1.220',1519987315,'__ci_last_regenerate|i:1519987315;'),('k15ko9mmmamcspaemt5um17alkn3jgol','10.240.1.97',1519987056,'__ci_last_regenerate|i:1519987056;'),('k2l2db4bhll4fq97vmuuhmrt044egcp0','10.240.0.222',1519986846,'__ci_last_regenerate|i:1519986846;'),('k3b95hg96ltus372ece7d2cmgnjt6nin','10.240.0.185',1519989342,'__ci_last_regenerate|i:1519989342;'),('k3q0m9mb9e3mvrije6b6s71ecaa9e1nh','10.240.0.88',1519987245,'__ci_last_regenerate|i:1519987245;'),('k56l4vrpuout7pccjt6bgl6bc993updl','10.240.0.227',1519986640,'__ci_last_regenerate|i:1519986640;'),('k65p2cjbfl66jv89c74sqhrvi24d17p0','10.240.1.0',1519988271,'__ci_last_regenerate|i:1519988271;'),('k69qpfib54jsr2unoabit74a1555epu9','10.240.1.0',1519989358,'__ci_last_regenerate|i:1519989358;'),('k6d34vea4pr75vjtbvi7fmd58i9mg23o','10.240.0.87',1519986961,'__ci_last_regenerate|i:1519986961;'),('k6iibp4mpom12kj44sv754ll4ndg2677','10.240.1.220',1519989452,'__ci_last_regenerate|i:1519989452;'),('k6jkjt9e10r56h4067bn12brlc2c7a0l','10.240.0.222',1519988843,'__ci_last_regenerate|i:1519988843;'),('k6nbhd1vkabtrhu5i65uf552orlsqjmn','10.240.0.187',1519987025,'__ci_last_regenerate|i:1519987025;'),('k775k8ecud30f7lrlt8247oei4vmuufu','10.240.0.222',1519990418,'__ci_last_regenerate|i:1519990418;'),('k78rd250vtmtbjjdadish4hrc83kh8rl','10.240.1.0',1519989482,'__ci_last_regenerate|i:1519989482;'),('k8a79hj0k7q6qg9pssug1e7k7rgf99fa','10.240.1.97',1519987526,'__ci_last_regenerate|i:1519987526;'),('kan024jni4pbeg2henvtud4v53be52vr','10.240.1.0',1519988416,'__ci_last_regenerate|i:1519988416;'),('kcr7gusclquli3tiigj29s8iti92rt6m','10.240.1.97',1519986871,'__ci_last_regenerate|i:1519986871;'),('kf165joctt0gb3acac0p28i0dfuvhjkb','10.240.0.222',1519990593,'__ci_last_regenerate|i:1519990593;'),('kf6c00tom4jsk5fj1cl7n931u573s4m4','10.240.0.88',1519987076,'__ci_last_regenerate|i:1519987076;'),('kfpkfl5gikt535od8h3h06dldus56kko','10.240.0.88',1519988457,'__ci_last_regenerate|i:1519988457;'),('kh34d8mbju3727jfouare2us0hr9107e','10.240.1.0',1519989928,'__ci_last_regenerate|i:1519989928;'),('ki2t87imjlmcsdscmd5qqccnvdn9gcic','10.240.0.87',1519990563,'__ci_last_regenerate|i:1519990563;'),('knf937l30hbjl18qn68qds84h3ng33tu','10.240.1.220',1519986691,'__ci_last_regenerate|i:1519986691;'),('kojtfgl4f0po2k96s2n7q4c7siil34q6','10.240.1.0',1519988477,'__ci_last_regenerate|i:1519988477;'),('kpgdrcask7pf7pb0friliu0nksck7i8v','10.240.1.0',1519988061,'__ci_last_regenerate|i:1519988061;'),('kqnsupfhrthkpl93mkhv68bv66uskvmt','10.240.0.239',1519990273,'__ci_last_regenerate|i:1519990273;'),('kqt0bpb6sfkmiu3fph22k5mc7c3unugh','10.240.0.87',1519987741,'__ci_last_regenerate|i:1519987741;'),('kr63t00a2vdjft3t7seekkb73327vjbp','10.240.0.90',1519988582,'__ci_last_regenerate|i:1519988582;'),('ksi404huh5p52suid7i4dguudmn74td2','10.240.0.90',1519990688,'__ci_last_regenerate|i:1519990688;'),('kv5j3h7u1sv9c2qqdtbf47omc6ev89t0','10.240.1.0',1519989197,'__ci_last_regenerate|i:1519989197;'),('kvpfjpo4nei9vbun8jmc8m7oak4q0ago','10.240.0.88',1519989318,'__ci_last_regenerate|i:1519989318;'),('l3soeb3s6vqnk8o3r1ptdlg5fckvmd58','10.240.0.239',1519987706,'__ci_last_regenerate|i:1519987706;'),('l5tab6dv1pdgc08e8lqbnh9iamd43614','10.240.0.87',1519988592,'__ci_last_regenerate|i:1519988592;'),('l6u1ct95idco7v3igjsqvd9pi8espplb','10.240.0.90',1519986680,'__ci_last_regenerate|i:1519986680;'),('l8ukvovioinc3cebgmp1edr0rc2t6fou','10.240.0.222',1519987896,'__ci_last_regenerate|i:1519987896;'),('l99dri37o6eisd1elsdfdsdo85707t91','10.240.1.0',1519988081,'__ci_last_regenerate|i:1519988081;'),('lant2ctfvi207j8m0uetlq8mhs9mi0u1','10.240.1.97',1519988838,'__ci_last_regenerate|i:1519988838;'),('lc4kd0j99q4r1h982198skkpuajdkfae','10.240.0.185',1519988862,'__ci_last_regenerate|i:1519988862;'),('lemb6hes7duh1tpvrebvvvu9umg3jifp','10.240.0.222',1519990403,'__ci_last_regenerate|i:1519990403;'),('lfa2i0hq49d4vavb7hrflbipoobn8l16','10.240.1.220',1519987851,'__ci_last_regenerate|i:1519987851;'),('lgl20f9a4iulpnif7hgubn1g7trgenj9','10.240.0.222',1519990303,'__ci_last_regenerate|i:1519990303;'),('lhjf1emapmsl37ue7j0gee61geumn42t','10.240.0.87',1519990728,'__ci_last_regenerate|i:1519990728;'),('li2irge73c9ficfu9f38qh3one2m8u8b','10.240.0.88',1519988633,'__ci_last_regenerate|i:1519988633;'),('ljla05h48c36bah8pl4n4igdujf16u75','10.240.0.90',1519987611,'__ci_last_regenerate|i:1519987611;'),('lkm7kkb4fekagqh7cbc1igdcmfvr4tg7','10.240.0.222',1519987496,'__ci_last_regenerate|i:1519987496;'),('lln2eao31mkdrkmnfqachrugoe1jqebm','10.240.0.222',1519987811,'__ci_last_regenerate|i:1519987811;'),('llroqd7cr407co3kgibijc5kisqoph02','10.240.0.222',1519989092,'__ci_last_regenerate|i:1519989092;'),('lltorlre4331akv9vek9qp7lmoinobrl','10.240.1.220',1519987831,'__ci_last_regenerate|i:1519987831;'),('lnsfcbbse7mr60n8inrsrh0vathlsppf','10.240.0.90',1519990448,'__ci_last_regenerate|i:1519990448;'),('lob386n9fv3ueekba7vte9gspel49b5i','10.240.1.99',1519990573,'__ci_last_regenerate|i:1519990573;'),('lqgca34teomgv5jqmmki6p0ba5u9orou','10.240.0.239',1519986831,'__ci_last_regenerate|i:1519986831;'),('lqh16o97m5mgn6fm9rlraa1piu797vas','10.240.0.88',1519989582,'__ci_last_regenerate|i:1519989582;'),('lr9pshh36aelgcqvcqu9vu6c1o1f4qlb','10.240.0.187',1519988697,'__ci_last_regenerate|i:1519988697;'),('lrjiiiq3bl24tvtqsmcq0k433gm9sd6t','10.240.0.187',1519986465,'__ci_last_regenerate|i:1519986465;'),('lsj90u02ugtq9440rqu4mc76ethsr7dj','10.240.0.239',1519987376,'__ci_last_regenerate|i:1519987376;'),('lsk6ceig8tbdls45p2jpcfmqoml15n0q','10.240.0.88',1519987120,'__ci_last_regenerate|i:1519987120;'),('lt7u9lnpkfr5prh1o8jr7gqufu65tv05','10.240.1.97',1519989007,'__ci_last_regenerate|i:1519989007;'),('luf0d6nqpn84voag2jglv868kll6fhmi','10.240.1.0',1519988046,'__ci_last_regenerate|i:1519988046;'),('m2orsbgibqpgn7p4rqpkaef6p0n5ci6v','10.240.1.0',1519988021,'__ci_last_regenerate|i:1519988021;'),('m2tdbpnnfofeti8qe4i0hrjimgsjjmhh','10.240.0.88',1519990013,'__ci_last_regenerate|i:1519990013;'),('m473henp1hoqs3bebfh6les52lntukgb','10.240.0.187',1519987401,'__ci_last_regenerate|i:1519987401;'),('m5588oi27tjrnc4c8brglm0k9gk0n6ee','10.240.1.97',1519990228,'__ci_last_regenerate|i:1519990228;'),('m7goohcpmrmuq2k2jai6ku4jrpuvnno9','10.240.1.97',1519987145,'__ci_last_regenerate|i:1519987145;'),('m7t5aausdned0fbohgg5j7pmk9klk308','10.240.1.97',1519988857,'__ci_last_regenerate|i:1519988857;'),('maa660r9f5thf29euuc99j31q64sajm0','10.240.1.97',1519990033,'__ci_last_regenerate|i:1519990033;'),('mb9cl7fspsnhgjthushnv5jqvbbaoa63','10.240.1.99',1519990553,'__ci_last_regenerate|i:1519990553;'),('mc7ov7thoofronkv8m7jmfk10k0oig0j','10.240.1.0',1519988256,'__ci_last_regenerate|i:1519988256;'),('mcqr85m596preng9cgvh4dmu693i9ha2','10.240.0.239',1519988692,'__ci_last_regenerate|i:1519988692;'),('medrog4974g52b17s31tkseg4l852uhp','10.240.1.97',1519988587,'__ci_last_regenerate|i:1519988587;'),('mge91g2u1li05l7hangmic655tl7kruv','10.240.1.0',1519988266,'__ci_last_regenerate|i:1519988266;'),('mgf3ntvatk5bcqbq3jmqdq2hk6pe2ju8','10.240.1.99',1519986615,'__ci_last_regenerate|i:1519986615;'),('mhfimm17af269khrivricl7o8lv9djfk','10.240.0.90',1519989978,'__ci_last_regenerate|i:1519989978;'),('mnep3b9rppqp7eterf7930f3jragdjie','10.240.0.222',1519987351,'__ci_last_regenerate|i:1519987351;'),('mod9q8qs7epltbljhg40vovsc8s1cvaq','10.240.0.187',1519986476,'__ci_last_regenerate|i:1519986476;'),('mqfold3c3msb8npm9btb7gb3d42lp279','10.240.1.0',1519988056,'__ci_last_regenerate|i:1519988056;'),('mqiedim9ntakb97ajrmu50e1gv5jats8','10.240.0.227',1519989542,'__ci_last_regenerate|i:1519989542;'),('mqrd735vr3gb6bap0l5kvfha91jo61aa','10.240.0.87',1519989193,'__ci_last_regenerate|i:1519989193;'),('mv01ffs817b4n0fhj8uc8ceo92q9tshd','10.240.1.189',1519987686,'__ci_last_regenerate|i:1519987686;'),('mvokbpfg8hrmoin5osiu23791jbbbh7v','10.240.1.220',1519989498,'__ci_last_regenerate|i:1519989498;'),('n03cbbqo72ctudcqqao3toekf45kqa5m','10.240.1.0',1519987991,'__ci_last_regenerate|i:1519987991;'),('n0674bpfsevc6ivn1tqoc21tmqbcfcg8','10.240.0.239',1519989723,'__ci_last_regenerate|i:1519989723;'),('n0k1sgghbta916gc4v57fdlqs24st7dd','10.240.1.220',1519990213,'__ci_last_regenerate|i:1519990213;'),('n0oifi68oajqjhkqeqj4rc18or28ndlj','10.240.0.227',1519990548,'__ci_last_regenerate|i:1519990548;'),('n1ankgv7glsq9esh8a9upt4eorrfu616','10.240.1.0',1519989798,'__ci_last_regenerate|i:1519989798;'),('n39sih736gbfmbmhkmn3pi4c6ngb4cj2','10.240.0.88',1519988201,'__ci_last_regenerate|i:1519988201;'),('n3gq74ta3j5hhn8ae0eh845g1hn232td','10.240.0.187',1519987841,'__ci_last_regenerate|i:1519987841;'),('n3klc32a987j5lgbe1ln7rf73tdrggmb','10.240.1.0',1519988847,'__ci_last_regenerate|i:1519988847;'),('n6sv9s8htples0eevirq7pmmk263qaug','10.240.1.0',1519988542,'__ci_last_regenerate|i:1519988542;'),('n7e0ofgghdbdc795p8jf5mel1nqlugfi','10.240.0.227',1519987130,'__ci_last_regenerate|i:1519987130;'),('n8mac7po808lfsnt5ipmq5t23uiht9fq','10.240.1.220',1519987906,'__ci_last_regenerate|i:1519987906;'),('n8uab5f4qo4laj5ik5i1msgs60kov2cr','10.240.0.222',1519987921,'__ci_last_regenerate|i:1519987921;'),('n9a00fpenp62nrrsua9ibj93ftgsc85m','10.240.0.239',1519986541,'__ci_last_regenerate|i:1519986541;'),('ne4l47vtr8vnghlc8fijfa27543pp5g7','10.240.1.0',1519989152,'__ci_last_regenerate|i:1519989152;'),('nf1c1fi4iiseq48670r152hkjapennga','10.240.1.99',1519988973,'__ci_last_regenerate|i:1519988973;'),('nfk2c3q2lchpgdbtk6jrvpb96ufnv3mv','10.240.1.189',1519988016,'__ci_last_regenerate|i:1519988016;'),('nfl11v750j03p339gad3jtua6lip378k','10.240.0.90',1519989322,'__ci_last_regenerate|i:1519989322;'),('ng32derrhg2qtb20ivurd8hq9r15md7r','10.240.0.90',1519987415,'__ci_last_regenerate|i:1519987415;'),('ngv2bpmdouvfon5vfig4ibnsskvpjnfe','10.240.0.222',1519987666,'__ci_last_regenerate|i:1519987666;'),('nherudb5e1se56khkt9ee8saod1ige91','10.240.0.187',1519987195,'__ci_last_regenerate|i:1519987195;'),('njsh52029esninjj1m4rnpmo6qodr8q1','10.240.0.88',1519988988,'__ci_last_regenerate|i:1519988988;'),('noe7218fccoq8cfrms5srajnb01nccq5','10.240.1.189',1519990203,'__ci_last_regenerate|i:1519990203;'),('np5e56v7vev9v6qpimrvc1teds6m3c27','10.240.0.187',1519990398,'__ci_last_regenerate|i:1519990398;'),('npbhnjdo39boiafkfln8avoq3tnfbhcd','10.240.0.87',1519987636,'__ci_last_regenerate|i:1519987636;'),('nq0ci6vku1nd79rjhhtv92po74scfq9p','10.240.1.220',1519987341,'__ci_last_regenerate|i:1519987341;'),('nqtg57foqksomm6f6pqf1p3agka4u4lh','10.240.0.185',1519990348,'__ci_last_regenerate|i:1519990348;'),('nr05sbp8atf8b93o9eqlp2ogvcnck4rg','10.240.1.0',1519988326,'__ci_last_regenerate|i:1519988326;'),('nr1ee94pthpclm0ntpaoouec6dl3djqg','10.240.1.220',1519987796,'__ci_last_regenerate|i:1519987796;'),('ns3vvpoh2mgk05kot4t78knot3ev8r06','10.240.0.88',1519986965,'__ci_last_regenerate|i:1519986965;'),('nsal3tp2o56mgmvv09cpkhm9tvi0go6j','10.240.1.0',1519988797,'__ci_last_regenerate|i:1519988797;'),('nseru3068ihbq9c93bkvdabi104db2cp','10.240.0.88',1519989423,'__ci_last_regenerate|i:1519989423;'),('ntks1a75dq18tlc11aoka5g0i7mbdtkn','10.240.1.0',1519989828,'__ci_last_regenerate|i:1519989828;'),('o0dub2355a5iehsn3u7e723hbv7cmah8','10.240.0.88',1519987156,'__ci_last_regenerate|i:1519987156;'),('o0g8t1l42857tt39p2g318qssgc79upa','10.240.0.90',1519988161,'__ci_last_regenerate|i:1519988161;'),('o1864grjmj3da299vcaaiu4k52k6v8i5','10.240.0.90',1519989307,'__ci_last_regenerate|i:1519989307;'),('o4i7rjaanisvvjia20k9d5frtekgs0t2','10.240.1.0',1519988923,'__ci_last_regenerate|i:1519988923;'),('o8p54irob0n26j9u33q0fpj23cj759hh','10.240.0.87',1519987436,'__ci_last_regenerate|i:1519987436;'),('obdhpfc6m46ffrlu353higdvm05hqpf7','10.240.1.99',1519989267,'__ci_last_regenerate|i:1519989267;'),('obv7p7kltptfvt9d7fa7trpmm47acc1g','10.240.0.88',1519987231,'__ci_last_regenerate|i:1519987231;'),('od1ggmrjho23cc7qlnp0vihnu6eea0ve','10.240.0.87',1519987256,'__ci_last_regenerate|i:1519987256;'),('oeqcth4draqlceht0kb98on301e0b4re','10.240.1.220',1519987631,'__ci_last_regenerate|i:1519987631;'),('oerle7e7ajf67vae9uo8oi12bnh7so7l','10.240.0.90',1519988351,'__ci_last_regenerate|i:1519988351;'),('og2qkptd0ul8nu4gut832ah3o2ebjda5','10.240.1.189',1519989312,'__ci_last_regenerate|i:1519989312;'),('ogmeo5amdbaf2tistdd1rln3m75j6om6','10.240.1.189',1519987701,'__ci_last_regenerate|i:1519987701;'),('oh8ts026iqfr267r1eudhlhgqor9ce2n','10.240.0.88',1519990218,'__ci_last_regenerate|i:1519990218;'),('ohpk30v64ld8mo4jnnpmmrimgluidg3b','10.240.1.99',1519988733,'__ci_last_regenerate|i:1519988733;'),('ojs9qbiiai729oveia0sn5igeg8t0ot7','10.240.1.220',1519989223,'__ci_last_regenerate|i:1519989223;'),('okgjfrs8e3a8gndo9jo4ghma9gsn1lms','10.240.0.87',1519989653,'__ci_last_regenerate|i:1519989653;'),('olv8nvi5pfneo920lu8ebr5n6froleo4','10.240.0.90',1519986551,'__ci_last_regenerate|i:1519986550;'),('omgmtv5r99l590cb1j03gjg1hcgm95pb','10.240.1.97',1519988031,'__ci_last_regenerate|i:1519988031;'),('onfvc9d6vc54b8mel7a2fi48kdm53rqb','10.240.1.99',1519989603,'__ci_last_regenerate|i:1519989603;'),('oqel0guticg5nk0jbfgrelna301q31hk','10.240.1.189',1519990538,'__ci_last_regenerate|i:1519990538;'),('oqpkb9khim71mbpai8kquurc0mhp35bp','10.240.1.0',1519989643,'__ci_last_regenerate|i:1519989643;'),('or822nn6c31qhedc3dtsf1jonagg28is','10.240.1.97',1519987792,'__ci_last_regenerate|i:1519987792;'),('orhbd314l3u7045f79r0b1guanbj36dn','10.240.1.0',1519988116,'__ci_last_regenerate|i:1519988116;'),('ot4js6dpnb8uob8730atfnc1fsimvqgd','10.240.1.97',1519989567,'__ci_last_regenerate|i:1519989567;'),('p102idruhqangovljedhgonpl7sla85p','10.240.0.187',1519986480,'__ci_last_regenerate|i:1519986480;'),('p25roli63bdpdra9j6quuotr12h0r8dq','10.240.0.87',1519987296,'__ci_last_regenerate|i:1519987296;'),('p2e31g09kl7jf4slb3ebqri5ajsv84tc','10.240.0.88',1519988346,'__ci_last_regenerate|i:1519988346;'),('p2u8gie002d8583m3ste77npk9o7ii3k','10.240.1.97',1519988723,'__ci_last_regenerate|i:1519988723;'),('p633jglmols1qpg6n76fm0pud0e0stvo','10.240.0.227',1519989078,'__ci_last_regenerate|i:1519989078;'),('p6lnoqehi5oel8h2feuesal0hqsvtq41','10.240.0.222',1519989943,'__ci_last_regenerate|i:1519989943;'),('p75l5ruo735rg23k380mucuvg7qnihs3','10.240.1.0',1519990498,'__ci_last_regenerate|i:1519990498;'),('p7uh2eib6iunr943a0q89ioflpocts6j','10.240.0.222',1519987481,'__ci_last_regenerate|i:1519987481;'),('p8jkiir3tvbbba76g2db2ttntmcjjs7m','10.240.1.99',1519990723,'__ci_last_regenerate|i:1519990723;'),('p9hi51rmes3heg8sg1eieemb4i9q9g1p','10.240.0.187',1519986791,'__ci_last_regenerate|i:1519986791;'),('pacg63mhvfdmbt5h9mdjlg1hptooim5n','10.240.1.97',1519990533,'__ci_last_regenerate|i:1519990533;'),('pd0uulikjp3fjs18he7rj8era7jpq6gc','10.240.0.222',1519987466,'__ci_last_regenerate|i:1519987466;'),('pdev6adr5a52o20hj7bhfpfn98mhiuva','10.240.0.227',1519988998,'__ci_last_regenerate|i:1519988998;'),('pf9h916umb2vq7qi94ime68353tg1qfa','10.240.0.239',1519987716,'__ci_last_regenerate|i:1519987716;'),('pg1k52e5u0re02i65fkbmgul1gh55b46','10.240.0.185',1519986756,'__ci_last_regenerate|i:1519986756;'),('pgr6f8s8a3adge8l7ial883fq03fuaev','10.240.0.187',1519987911,'__ci_last_regenerate|i:1519987911;'),('ph09t57icjfu4ts9r1o54akb71p3j7at','10.240.1.97',1519990508,'__ci_last_regenerate|i:1519990508;'),('ph1ftcs6cccuiggnab03ehbi5ls2q352','10.240.0.187',1519987166,'__ci_last_regenerate|i:1519987165;'),('ph1t1c0fak1e059fk8fr5ead29jsm6h1','10.240.1.0',1519989773,'__ci_last_regenerate|i:1519989773;'),('pitiqlrj5hqbnodcv73i1996r713r3s5','10.240.1.0',1519988076,'__ci_last_regenerate|i:1519988076;'),('pj3uaijn5k1pevqr25bce2qk8mb8dsbu','10.240.1.99',1519986546,'__ci_last_regenerate|i:1519986546;'),('ple6bib9t57cqqca8phnhod7pchh28i0','10.240.1.97',1519987270,'__ci_last_regenerate|i:1519987270;'),('pmtmdj3ljedfu8k51a1k6pm49vrpphle','10.240.0.187',1519987406,'__ci_last_regenerate|i:1519987406;'),('pnr7kg9qnnvp85ua3f0bg8hle3fic104','10.240.0.88',1519988371,'__ci_last_regenerate|i:1519988371;'),('pub6oj4o8a5rrnu3mo2dgqb6g2891oa7','10.240.1.0',1519988436,'__ci_last_regenerate|i:1519988436;'),('puktl2fuh1bt4v1hmp6i8ehr78u0ui83','10.240.0.227',1519986775,'__ci_last_regenerate|i:1519986775;'),('pv2rve54g1ardkit40nd8a2n031kpj3i','10.240.1.0',1519988982,'__ci_last_regenerate|i:1519988982;'),('pvfvb0ne5q2o46jckkvak1da41a6rcrh','10.240.1.99',1519990363,'__ci_last_regenerate|i:1519990363;'),('pvrq2i62fgko7nljl5m36j7v9p3ftmeo','10.240.0.239',1519990488,'__ci_last_regenerate|i:1519990488;'),('q0d1qrd27pqem9smj19n3rhikkmjht31','10.240.0.90',1519989533,'__ci_last_regenerate|i:1519989533;'),('q1346niaf5jkl3h14t7mc5ouf3glefka','10.240.0.90',1519988657,'__ci_last_regenerate|i:1519988657;'),('q1g0sle5dac4h986c0bcl2c9ta2pgo9g','10.240.1.97',1519986931,'__ci_last_regenerate|i:1519986931;'),('q1hkv95oshr9p9etj8otchd2je2n2p92','10.240.0.227',1519989818,'__ci_last_regenerate|i:1519989818;'),('q1j05bb1pqenbna0rq6bj51bfhot11so','10.240.0.239',1519986920,'__ci_last_regenerate|i:1519986920;'),('q1ogmhcouvhac1govekcsb2pqap6f5s0','10.240.1.0',1519988411,'__ci_last_regenerate|i:1519988411;'),('q4omuk57m38hpanrrofk84c0np3su1mv','10.240.1.99',1519986706,'__ci_last_regenerate|i:1519986706;'),('q60rnd6j5a3olspj8vfbc4d12qv6as6v','10.240.1.189',1519990143,'__ci_last_regenerate|i:1519990143;'),('q6ohgkivi2vq64754vbuheue7diuk1q7','10.240.0.88',1519990514,'__ci_last_regenerate|i:1519990514;'),('q7e6g6opk9qdfj1om849c05ohpmddfuq','10.240.0.187',1519987901,'__ci_last_regenerate|i:1519987901;'),('q7hqb2v5skti40sf1ek4sjghnocr0blv','10.240.0.187',1519988713,'__ci_last_regenerate|i:1519988713;'),('q8cj3vbpfqhvgso84rrs7k1ajf1veru7','10.240.1.97',1519989338,'__ci_last_regenerate|i:1519989338;'),('q92ssrqt9g7apmuckk6en5a3fl7hssij','10.240.0.227',1519986716,'__ci_last_regenerate|i:1519986716;'),('q9np1t2hr6e7jai7ks9fpb53mv9r3od7','10.240.1.220',1519987385,'__ci_last_regenerate|i:1519987385;'),('q9tc8kpfslabt4b53eev8b8uqk6p9kle','10.240.1.220',1519988702,'__ci_last_regenerate|i:1519988702;'),('qa0grvm8aktedkttjeubt59ssrbm93f5','10.240.0.222',1519987561,'__ci_last_regenerate|i:1519987561;'),('qb17fb9l7ttj80gk9t12nrdst2a6er5c','10.240.1.0',1519989143,'__ci_last_regenerate|i:1519989143;'),('qc36nc7i0p5dgm2965kcaqa9pb6dqmfe','10.240.0.87',1519987265,'__ci_last_regenerate|i:1519987265;'),('qgfbk2dk0mbikiegabqtl4d0gak7perp','10.240.0.222',1519986950,'__ci_last_regenerate|i:1519986950;'),('qmntifrg9mig63o67jagauji9kkjhkr9','10.240.0.90',1519989208,'__ci_last_regenerate|i:1519989208;'),('qn3jjpt87q42pmg58u0j9slj9ksdb2ve','10.240.0.87',1519987881,'__ci_last_regenerate|i:1519987881;'),('qne2c3q8f3u8li16igm60dvr54fsfp54','10.240.0.87',1519987326,'__ci_last_regenerate|i:1519987326;'),('qp8mb40d26tmq0bop15sgl8l3ba3b3lq','10.240.1.0',1519988226,'__ci_last_regenerate|i:1519988226;'),('qqpuh7ketr4efqk840dri5ucho63ttq0','10.240.1.0',1519988788,'__ci_last_regenerate|i:1519988788;'),('qs6kefb83gv07bllgttmchnn3a3og8tk','10.240.1.189',1519989292,'__ci_last_regenerate|i:1519989292;'),('qsmk3ln1s0oq8ned2rgisf1b7n81jrku','10.240.0.222',1519990373,'__ci_last_regenerate|i:1519990373;'),('r07l9bdjnh03ff0o6r0qqfn3f4q49ut5','10.240.1.189',1519989102,'__ci_last_regenerate|i:1519989102;'),('r114rnrkm7hd8vk15d0bgrh3nu762ms2','10.240.1.189',1519990308,'__ci_last_regenerate|i:1519990308;'),('r4kv22c82bd54alois4f4fi2idcug2nv','10.240.0.222',1519990163,'__ci_last_regenerate|i:1519990163;'),('r598o7tvl3nueqac2pf1tgqppe6e7msr','10.240.0.185',1519989352,'__ci_last_regenerate|i:1519989352;'),('r6suirpvud338ocbqdmhp3dpmsdm01e6','10.240.1.220',1519987171,'__ci_last_regenerate|i:1519987171;'),('r7svs1sfcvskm3eaitoc978md7440aau','10.240.0.222',1519986455,'__ci_last_regenerate|i:1519986455;'),('rafkdc1vufg94n6m7croctsj8uu3iso3','10.240.1.0',1519987971,'__ci_last_regenerate|i:1519987971;'),('rcupci736jcacobtd0phk6vhn61kt3vm','10.240.0.239',1519989898,'__ci_last_regenerate|i:1519989898;'),('rdd9lr5vlngskos73v7o6nab471l6pv3','10.240.0.222',1519987651,'__ci_last_regenerate|i:1519987651;'),('rdo2i32a54pooptufodlm3j75u24kdu7','10.240.1.189',1519987536,'__ci_last_regenerate|i:1519987536;'),('rgnk8uqnp2cgdfdpdtla4mcv6g80e0co','10.240.1.220',1519987421,'__ci_last_regenerate|i:1519987421;'),('rid1ve8go979cmei1s38hujosaa7tk12','10.240.1.189',1519990479,'__ci_last_regenerate|i:1519990479;'),('rki33u8sj346u6sqr8pt11om7mshn2ih','10.240.1.0',1519988401,'__ci_last_regenerate|i:1519988401;'),('rmgpvvd5ctrh7uut2n43s8nplmvj56mj','10.240.1.0',1519988291,'__ci_last_regenerate|i:1519988291;'),('roc33qmu1e647u894skm37bmipcikrl8','10.240.0.222',1519988622,'__ci_last_regenerate|i:1519988622;'),('rputrusthfuf4bcqec6hfalbskd4j6c6','10.240.0.222',1519986516,'__ci_last_regenerate|i:1519986516;'),('rtdpgbhtiuv41er5d63qioha6svk5b4c','10.240.1.220',1519988286,'__ci_last_regenerate|i:1519988286;'),('ruarue6hhaigu9sbrm6ngpr4oa3o3n77','10.240.0.87',1519990318,'__ci_last_regenerate|i:1519990318;'),('rud0o8ok8bthht5nlnpqpat55h9tojl2','10.240.1.220',1519989613,'__ci_last_regenerate|i:1519989613;'),('rug7p1gv4vk2k4fjeja9qg7m2rpadf2k','10.240.1.189',1519989258,'__ci_last_regenerate|i:1519989258;'),('rujc268qu7ut0tecdga2o8ulu2surbcv','10.240.0.227',1519989087,'__ci_last_regenerate|i:1519989087;'),('s0m6hpkgkv30nkfjphputg43kuqcudq0','10.240.1.0',1519988812,'__ci_last_regenerate|i:1519988812;'),('s4ej60n72tt95dauapg9n0902bj9mu02','10.240.0.227',1519986796,'__ci_last_regenerate|i:1519986796;'),('s5h8o4pbde0h6f5ss20bedooeavf407g','10.240.0.187',1519986781,'__ci_last_regenerate|i:1519986780;'),('s5s6slpas47f4jitn23ikbgdec26560g','10.240.1.189',1519989527,'__ci_last_regenerate|i:1519989527;'),('s630j5ddbnrld60da9668nep9jukm36j','10.240.0.187',1519989763,'__ci_last_regenerate|i:1519989763;'),('s7jidco7umca2jdmfe94ffeenu51lhpr','10.240.0.185',1519988728,'__ci_last_regenerate|i:1519988728;'),('s7ouet0soo5j955k7begk78ujiuou42j','10.240.1.189',1519988707,'__ci_last_regenerate|i:1519988707;'),('s7p52p1tqa0u5qn6g0req5r55ct87unh','10.240.1.0',1519988051,'__ci_last_regenerate|i:1519988051;'),('s7t2mps4gkodehdh4dpbjq12rbeqtq5b','10.240.1.0',1519989213,'__ci_last_regenerate|i:1519989213;'),('s8b7gbcgj33emcg544ec33p64mfonm2g','10.240.1.189',1519987236,'__ci_last_regenerate|i:1519987236;'),('s8t5lq6io5u9h2iklcjoctek9h5r530u','10.240.0.222',1519988171,'__ci_last_regenerate|i:1519988171;'),('s94t1roq5t7bo77o96qm2ostkgo5psj4','10.240.0.187',1519987874,'__ci_last_regenerate|i:1519987874;'),('sa83l6hcf80uruiafmkdebe6avr230na','10.240.0.87',1519987941,'__ci_last_regenerate|i:1519987941;'),('sa9sb3f42k4nvd1qtererc0hpg47bp4e','10.240.0.187',1519990268,'__ci_last_regenerate|i:1519990268;'),('sanfkk2dt67poeek3lv5mo7mr4dq6e48','10.240.1.99',1519988356,'__ci_last_regenerate|i:1519988356;'),('sb40pjhsf7uei9q2uvsrv6qbo3b89cq4','10.240.0.90',1519990733,'__ci_last_regenerate|i:1519990733;'),('sbljhl3kpdamo4v9k6k4a0f2p2d1b889','10.240.1.97',1519990243,'__ci_last_regenerate|i:1519990243;'),('scg3hmah32mjhuue1fursquajkti6ocm','10.240.0.185',1519986976,'__ci_last_regenerate|i:1519986976;'),('sd9f0mbo58v0vs16e18h4ouuibiklvdo','10.240.0.187',1519986495,'__ci_last_regenerate|i:1519986495;'),('sddcift13hc9hem5fcg80ps81np89gca','10.240.0.187',1519986570,'__ci_last_regenerate|i:1519986570;'),('sdg4rjqv965o5860qrovtttdnsu6vfvd','10.240.0.87',1519988627,'__ci_last_regenerate|i:1519988627;'),('shbd33rc9cqrbno0bgsgdrtc94epl4ej','10.240.1.220',1519987431,'__ci_last_regenerate|i:1519987431;'),('sk2ocr3bh2112r1n6b6q2o6b5cp2eci3','10.240.1.97',1519990698,'__ci_last_regenerate|i:1519990698;'),('skao65hflpcr4b52umb5fpvdtifu0kgv','10.240.1.189',1519989632,'__ci_last_regenerate|i:1519989632;'),('slqurqorta25j76hi4qoahic4b9db51i','10.240.0.222',1519990443,'__ci_last_regenerate|i:1519990443;'),('smniu4uqa0s49npaik7eq36bo9cc8b29','10.240.0.87',1519988196,'__ci_last_regenerate|i:1519988196;'),('smr7794a37ts5dgakfd7njj16cql0q1f','10.240.0.222',1519988156,'__ci_last_regenerate|i:1519988156;'),('sn6njd7kvnjvvqbqab40abmru8ggno62','10.240.1.99',1519990568,'__ci_last_regenerate|i:1519990568;'),('sop7c7v8ov98cggj3i77tr49tc2e8isv','10.240.0.88',1519989418,'__ci_last_regenerate|i:1519989418;'),('su31bac0dqiaeh7r2jvcgecnsr9d08hq','10.240.1.0',1519988066,'__ci_last_regenerate|i:1519988066;'),('su4reld0e8n64n8fnnl0omie665va9ps','10.240.1.0',1519988251,'__ci_last_regenerate|i:1519988251;'),('suo5kogcfc88ov43561bdbpmv0t5odt9','10.240.0.222',1519987541,'__ci_last_regenerate|i:1519987541;'),('sv58s2uhc4uuqinnqjjk8ahn87d18jue','10.240.0.90',1519988652,'__ci_last_regenerate|i:1519988652;'),('sv9r9dsc87cdcb3tis9evvjhn26ul0e6','10.240.0.227',1519989132,'__ci_last_regenerate|i:1519989132;'),('t06cdhlc7l5989u3n6su04kk47s5ti66','10.240.1.220',1519986700,'__ci_last_regenerate|i:1519986700;'),('t2qi5vdcp2kkone3kh4vk1r7bmb25240','10.240.0.185',1519988993,'__ci_last_regenerate|i:1519988993;'),('t3j1sbbok4and32gm79f7uerd4capaau','10.240.1.189',1519988236,'__ci_last_regenerate|i:1519988236;'),('t4rdbeg86k3ptlvqfge9cnge12upt5uk','10.240.0.227',1519990343,'__ci_last_regenerate|i:1519990343;'),('t56bp1tl1pv5kcpr0gkqqpvuemubt85a','10.240.0.185',1519986826,'__ci_last_regenerate|i:1519986826;'),('t73gh3si5tl6koabv7csckgibmo1cm4t','10.240.0.88',1519987768,'__ci_last_regenerate|i:1519987763;'),('t81fkjb8tuddjnas7fdqa1b778s708uf','10.240.1.0',1519988602,'__ci_last_regenerate|i:1519988602;'),('t98p39e0220onmbon6rgab6p7oejhqhr','10.240.1.97',1519990383,'__ci_last_regenerate|i:1519990383;'),('t9tjsrt1lqe14c1eqhc7iifje1de58lu','10.240.1.0',1519988737,'__ci_last_regenerate|i:1519988737;'),('tav6kr2t1sr064iqondpim15oqtu4k15','10.240.0.90',1519989118,'__ci_last_regenerate|i:1519989118;'),('tc9lga27021kun751rl6ok7bt22bjqfn','10.240.1.189',1519987616,'__ci_last_regenerate|i:1519987616;'),('td45qsb4m6sg8o384budu8t4kdqc43gu','10.240.1.189',1519987596,'__ci_last_regenerate|i:1519987596;'),('tdcpnlsj0q4mmikjgvvae9ehsmajqq7s','10.240.0.239',1519986816,'__ci_last_regenerate|i:1519986816;'),('tdem2vtdbp912mkmo5p38ajneg5d0j4o','10.240.0.187',1519990648,'__ci_last_regenerate|i:1519990648;'),('ter2srbs48uhv9i1j6sve7nq6s6uakg8','10.240.1.0',1519987976,'__ci_last_regenerate|i:1519987976;'),('tet3m1b7ca219l3i7hq29to0hrs325gq','10.240.1.220',1519987691,'__ci_last_regenerate|i:1519987691;'),('tfh60ueu4ptu7ovha8etba1qqnvc07vt','10.240.1.99',1519989247,'__ci_last_regenerate|i:1519989247;'),('tg8jndcrn4hnsja25n2mej4p528lftct','10.240.1.0',1519987961,'__ci_last_regenerate|i:1519987961;'),('tg91qs4ue42lhorilo9md4520eeers0r','10.240.1.97',1519987045,'__ci_last_regenerate|i:1519987045;'),('tgkrh8cu5651s1in5o3ohjm6f1jmr4pm','10.240.0.222',1519988948,'__ci_last_regenerate|i:1519988948;'),('thkktcdl7r83enbekar32aivslejhe69','10.240.0.88',1519987876,'__ci_last_regenerate|i:1519987876;'),('tlr5fstv7oeu0a0nb3854flahubr8olp','10.240.0.185',1519989617,'__ci_last_regenerate|i:1519989617;'),('tmffnn0v81t97eugvcaenlcr597k1h1f','10.240.0.87',1519989427,'__ci_last_regenerate|i:1519989427;'),('tmr86ge9etb7touebsjfrbjca17db3ha','10.240.1.99',1519989503,'__ci_last_regenerate|i:1519989503;'),('toffelclluqcdcjcpl6httap2tek7rf5','10.240.1.0',1519988952,'__ci_last_regenerate|i:1519988952;'),('tpnt7rqbgshsh40la9da89kmfcd7cn88','10.240.0.222',1519988552,'__ci_last_regenerate|i:1519988552;'),('tq9kuv19nvqmqoudgvvt6a9tcj16drq0','10.240.0.90',1519989738,'__ci_last_regenerate|i:1519989738;'),('tqb3c7mch4mhvfcec3oi01go7fl69rad','10.240.1.99',1519989708,'__ci_last_regenerate|i:1519989708;'),('tr0bt7a6e8eqmo801ltfemp8ie4pmon8','10.240.1.99',1519990678,'__ci_last_regenerate|i:1519990678;'),('tr1825ep66o6fb9loio4hbg3ot2igung','10.240.0.227',1519989623,'__ci_last_regenerate|i:1519989623;'),('tr9rmn0hvujrg71dskvbi15pr9gs6ekp','10.240.0.185',1519987115,'__ci_last_regenerate|i:1519987115;'),('tssqec0cimplebt9v2630mi2rt5hb90e','10.240.0.88',1519987891,'__ci_last_regenerate|i:1519987891;'),('ttc3s97dnpkuv75p9d5ni61nmvtgq4lt','10.240.0.88',1519989252,'__ci_last_regenerate|i:1519989252;'),('ttr5skt611g78gr8t5alr157aj17ugu3','10.240.1.97',1519990153,'__ci_last_regenerate|i:1519990153;'),('ttv5nlrdvqu2fej10e1kjb5kvu0eb8c9','10.240.0.87',1519987926,'__ci_last_regenerate|i:1519987926;'),('u2armtv8bu3tbjt01mb3hgkv9sugc3h1','10.240.0.90',1519989973,'__ci_last_regenerate|i:1519989973;'),('u2p25v1ek35e6da1bjlbo1519a779pem','10.240.1.0',1519988136,'__ci_last_regenerate|i:1519988136;'),('u3efvueil6p5rbadjbjtt1s7jq8ni0rf','10.240.1.220',1519986655,'__ci_last_regenerate|i:1519986655;'),('u3v6udc8um4au0ns5o3lqep4d62fi4jn','10.240.0.88',1519990543,'__ci_last_regenerate|i:1519990543;'),('u69ugme3ntki5hj7e9rec36c5jmopg51','10.240.0.185',1519987345,'__ci_last_regenerate|i:1519987345;'),('u7al29p204081r0gmm3qs9hujt7q4i9a','10.240.1.0',1519988091,'__ci_last_regenerate|i:1519988091;'),('u7ft3sshhhke08u08m9hga1ffp01v9ua','10.240.1.97',1519989263,'__ci_last_regenerate|i:1519989263;'),('u8l1c9v8cgl8jr012pa8it7ddge7emuh','10.240.0.88',1519989808,'__ci_last_regenerate|i:1519989808;'),('u9524h7102e1tq2c3l5iiphgeu4hrecj','10.240.1.220',1519990133,'__ci_last_regenerate|i:1519990133;'),('ubo4snc4liald4rgse3rm2a4b9g8gvgu','10.240.0.87',1519986990,'__ci_last_regenerate|i:1519986990;'),('ubonlrsn45d21dvd6jr6eo45an13gu0s','10.240.0.87',1519986915,'__ci_last_regenerate|i:1519986915;'),('ud5kj8qb5o05nnnpq77jklh345d1upkp','10.240.1.97',1519987001,'__ci_last_regenerate|i:1519987001;'),('uifasdiho5jd39tfpo1vivu8m34eds4d','10.240.0.87',1519987956,'__ci_last_regenerate|i:1519987956;'),('ujsidt2q2j8usd934eeib4ihapbffqfl','10.240.0.187',1519987936,'__ci_last_regenerate|i:1519987936;'),('uk13b3ctuh3e3amq27rrjmso4t9j6r2g','10.240.0.239',1519988482,'__ci_last_regenerate|i:1519988482;'),('ul5lk28mi60ek78mctu5op9rocbth49c','10.240.0.90',1519990583,'__ci_last_regenerate|i:1519990583;'),('un3c4ub7nukih6a6mitig3fvtu76ockq','10.240.0.87',1519988447,'__ci_last_regenerate|i:1519988447;'),('uoj32gq7m5h89hs4r6sp27co68cfcsrr','10.240.0.87',1519987030,'__ci_last_regenerate|i:1519987030;'),('up8fdr4qa4tit9242n753cev6k6p95e6','10.240.0.90',1519987186,'__ci_last_regenerate|i:1519987186;'),('upmmmpoa78hg1ejf1knh5a0eo4jp92lq','10.240.1.0',1519989377,'__ci_last_regenerate|i:1519989377;'),('ur6nihufhoii0ecdsg0ekjph4iqjtllf','10.240.1.97',1519986670,'__ci_last_regenerate|i:1519986670;'),('us33pglck6ldj0grj565i7vp761rpgve','10.240.1.99',1519986740,'__ci_last_regenerate|i:1519986740;'),('uu03o4hmnq01gal90aomt105n33fgqdp','10.240.1.99',1519988643,'__ci_last_regenerate|i:1519988643;'),('uu64sd0pgl53pvlmsic6hvqb9fes8hfv','10.240.0.227',1519987300,'__ci_last_regenerate|i:1519987300;'),('v0goi4kvdlq1bkhjif7e4hn9vm8rg19c','10.240.1.99',1519986725,'__ci_last_regenerate|i:1519986725;'),('v23md4sqthdp385sgvl9e2381cs3ae02','10.240.1.97',1519989677,'__ci_last_regenerate|i:1519989677;'),('v3ktf994hkgko1bfufagdbebt20e4512','10.240.1.0',1519988396,'__ci_last_regenerate|i:1519988396;'),('v4b6avk2h1o8ra5u105411bv9ja4dijj','10.240.0.87',1519989018,'__ci_last_regenerate|i:1519989018;'),('v4ua8ruokbams2a4akp031mobcv15lk7','10.240.1.97',1519988963,'__ci_last_regenerate|i:1519988963;'),('v63ogcah15q958vn5fp3of9oo4n0pe9n','10.240.1.97',1519986556,'__ci_last_regenerate|i:1519986556;'),('v6plcodbln9fccgiiio0d4v60qr85oaj','10.240.0.227',1519987081,'__ci_last_regenerate|i:1519987081;'),('v8m94gdsvcu8884ofvggrvv0h64av04r','10.240.0.187',1519990043,'__ci_last_regenerate|i:1519990043;'),('v9tmf33soo3e4kfubc19inkpjlqeiss3','10.240.1.189',1519988361,'__ci_last_regenerate|i:1519988361;'),('vaec3ui8eio51iuoiprtmmkifh4p6hnq','10.240.0.187',1519990628,'__ci_last_regenerate|i:1519990628;'),('vb1crmvosk6f79sh70b0coao35i9o0os','10.240.0.222',1519987726,'__ci_last_regenerate|i:1519987726;'),('vcfap9bbirk9skd54kbn6moc0anm3btt','10.240.0.222',1519989908,'__ci_last_regenerate|i:1519989908;'),('ve8kk2huk324fd8vc6vcie01op9i7mgm','10.240.1.97',1519990718,'__ci_last_regenerate|i:1519990718;'),('vjkal5smlbjap34kvc2tlk34cku6v90l','10.240.0.222',1519990603,'__ci_last_regenerate|i:1519990603;'),('vkvkvgblgp7emherkvpr0t0rrarl7pv5','10.240.0.90',1519988467,'__ci_last_regenerate|i:1519988467;'),('vlf53udsifv0rit7ivv53cmtplfh8s74','10.240.1.220',1519987036,'__ci_last_regenerate|i:1519987036;'),('vlhomlj9i7c4tvg8pgdluhcfpc2ltnie','10.240.1.99',1519990613,'__ci_last_regenerate|i:1519990613;'),('vm851d3c6h6ulr819mrud3ien35483d2','10.240.0.88',1519987586,'__ci_last_regenerate|i:1519987586;'),('vm8uuag0jc7ptbamkuhhircqgbuh2k5d','10.240.0.90',1519986620,'__ci_last_regenerate|i:1519986620;'),('vn8r2dj25b3rdtccm6moh0u1474eke33','10.240.0.222',1519990633,'__ci_last_regenerate|i:1519990633;'),('vnqp4kl9mpm8m8078lvo5uetg84pjrkn','10.240.1.0',1519988547,'__ci_last_regenerate|i:1519988547;'),('vs97598o4c2silh509i7vdml9j6r57e7','10.240.0.222',1519988216,'__ci_last_regenerate|i:1519988216;'),('vu80dkk9lsfeq74kiemitn9mm4b1j9g8','10.240.0.185',1519987191,'__ci_last_regenerate|i:1519987191;');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `currencies`
--

DROP TABLE IF EXISTS `currencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `currencies` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `symbol` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currencies`
--

LOCK TABLES `currencies` WRITE;
/*!40000 ALTER TABLE `currencies` DISABLE KEYS */;
INSERT INTO `currencies` VALUES (1,'Pounds','£','GBP'),(2,'Dollars','$','USD'),(4,'Euros','€','EUR');
/*!40000 ALTER TABLE `currencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `custom_fields`
--

DROP TABLE IF EXISTS `custom_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `custom_fields` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `options` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `required` int(11) NOT NULL,
  `profile` int(11) NOT NULL,
  `edit` int(11) NOT NULL,
  `help_text` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `register` int(11) NOT NULL,
  `leads` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `custom_fields`
--

LOCK TABLES `custom_fields` WRITE;
/*!40000 ALTER TABLE `custom_fields` DISABLE KEYS */;
/*!40000 ALTER TABLE `custom_fields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email_templates`
--

DROP TABLE IF EXISTS `email_templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email_templates` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `hook` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email_templates`
--

LOCK TABLES `email_templates` WRITE;
/*!40000 ALTER TABLE `email_templates` DISABLE KEYS */;
INSERT INTO `email_templates` VALUES (1,'Forgot Your Password','<p>Dear [NAME],<br />\r\n<br />\r\nSomeone (hopefully you) requested a password reset at [SITE_URL].<br />\r\n<br />\r\nTo reset your password, please follow the following link: [EMAIL_LINK]<br />\r\n<br />\r\nIf you did not reset your password, please kindly ignore this email.<br />\r\n<br />\r\nYours,<br />\r\n[SITE_NAME]</p>\r\n','forgot_password','english'),(2,'Email Activation','<p>Dear [NAME],<br />\r\n<br />\r\nSomeone (hopefully you) has registered an account on [SITE_NAME] using this email address.<br />\r\n<br />\r\nPlease activate the account by following this link: [EMAIL_LINK]<br />\r\n<br />\r\nIf you did not register an account, please kindly ignore this email.<br />\r\n<br />\r\nYours,<br />\r\n[SITE_NAME]</p>\r\n','email_activation','english'),(3,'Support Ticket Reply','<p>## - REPLY ABOVE THIS LINE - ##<br />\r\n<br />\r\nDear [NAME],<br />\r\n<br />\r\nA new reply was posted on your ticket:<br />\r\n<br />\r\n[TICKET_BODY]<br />\r\n<br />\r\nTicket was generated here: [SITE_URL]<br />\r\n<br />\r\n## Ticket ID: [TICKET_ID] ##<br />\r\n<br />\r\nYours,<br />\r\n[SITE_NAME]</p>\r\n','ticket_reply','english'),(4,'Support Ticket Creation','<p>## - REPLY ABOVE THIS LINE - ##<br />\r\n<br />\r\nDear [NAME],<br />\r\n<br />\r\nThanks for creating a ticket at our site: [SITE_URL]<br />\r\n<br />\r\nYour message:<br />\r\n<br />\r\n[TICKET_BODY]<br />\r\n<br />\r\nWe&#39;ll be in touch shortly.<br />\r\n<br />\r\n## Ticket ID: [TICKET_ID] ##<br />\r\n<br />\r\nYours,<br />\r\n[SITE_NAME]</p>\r\n','ticket_creation','english'),(5,'Ordered Service','<p>Dear [NAME],<br />\r\n<br />\r\nThank you for ordering our service. Before we can complete it for you, please make sure you have paid the invoice. You can view the invoice at: <a href=\"[INVOICE_URL]\">[INVOICE_URL]</a>.<br />\r\n<br />\r\nOnce the Invoice has been paid, we will contact you via email to let you know when the service has been completed.<br />\r\n<br />\r\nThank you,<br />\r\n[SITE_NAME]</p>\r\n','ordered_service','english'),(6,'Client Questionaire','<p>Dear Client ...</p>\r\n\r\n<p>&nbsp;</p>\r\n','ordered_service','english');
/*!40000 ALTER TABLE `email_templates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `finance`
--

DROP TABLE IF EXISTS `finance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `finance` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `projectid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `notes` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `time_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `finance`
--

LOCK TABLES `finance` WRITE;
/*!40000 ALTER TABLE `finance` DISABLE KEYS */;
INSERT INTO `finance` VALUES (1,'Test',7,1,'<p>aaaaa</p>\r\n',1510347692,1111.00,1,11,2017,'2017-11-10'),(2,'tet',7,1,'',1510348632,-100.00,2,11,2017,'2017-11-10');
/*!40000 ALTER TABLE `finance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `finance_categories`
--

DROP TABLE IF EXISTS `finance_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `finance_categories` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `finance_categories`
--

LOCK TABLES `finance_categories` WRITE;
/*!40000 ALTER TABLE `finance_categories` DISABLE KEYS */;
INSERT INTO `finance_categories` VALUES (1,'Default','<p></p>\n'),(2,'KYC','');
/*!40000 ALTER TABLE `finance_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `home_stats`
--

DROP TABLE IF EXISTS `home_stats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `home_stats` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `google_members` int(11) NOT NULL,
  `facebook_members` int(11) NOT NULL,
  `twitter_members` int(11) NOT NULL,
  `total_members` int(11) NOT NULL,
  `new_members` int(11) NOT NULL,
  `active_today` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `home_stats`
--

LOCK TABLES `home_stats` WRITE;
/*!40000 ALTER TABLE `home_stats` DISABLE KEYS */;
INSERT INTO `home_stats` VALUES (1,0,0,0,5,1,4,1518699878);
/*!40000 ALTER TABLE `home_stats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `home_stats_user`
--

DROP TABLE IF EXISTS `home_stats_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `home_stats_user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `projects` int(11) NOT NULL,
  `tasks` int(11) NOT NULL,
  `time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  `time_projects` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `home_stats_user`
--

LOCK TABLES `home_stats_user` WRITE;
/*!40000 ALTER TABLE `home_stats_user` DISABLE KEYS */;
INSERT INTO `home_stats_user` VALUES (1,1,2,9,'0',1519980429,'a:0:{}'),(2,3,2,9,'0',1519308808,'a:0:{}'),(3,4,0,0,'0',1501620168,'a:0:{}'),(4,5,1,3,'0',1506865315,'a:0:{}'),(5,6,1,2,'0',1509896053,'a:0:{}'),(6,7,2,9,'0',1519308802,'a:0:{}'),(7,8,3,10,'0',1519986442,'a:0:{}');
/*!40000 ALTER TABLE `home_stats_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice_items`
--

DROP TABLE IF EXISTS `invoice_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoice_items` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `invoiceid` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice_items`
--

LOCK TABLES `invoice_items` WRITE;
/*!40000 ALTER TABLE `invoice_items` DISABLE KEYS */;
INSERT INTO `invoice_items` VALUES (2,1,'KYC Review',1.00,1000.00);
/*!40000 ALTER TABLE `invoice_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice_reoccur`
--

DROP TABLE IF EXISTS `invoice_reoccur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoice_reoccur` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `clientid` int(11) NOT NULL,
  `templateid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `amount_time` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `start_date` int(11) NOT NULL,
  `end_date` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `last_occurence` int(11) NOT NULL,
  `next_occurence` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice_reoccur`
--

LOCK TABLES `invoice_reoccur` WRITE;
/*!40000 ALTER TABLE `invoice_reoccur` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoice_reoccur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice_settings`
--

DROP TABLE IF EXISTS `invoice_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoice_settings` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `enable_paypal` int(11) NOT NULL DEFAULT '1',
  `enable_stripe` int(11) NOT NULL,
  `enable_checkout2` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice_settings`
--

LOCK TABLES `invoice_settings` WRITE;
/*!40000 ALTER TABLE `invoice_settings` DISABLE KEYS */;
INSERT INTO `invoice_settings` VALUES (1,'invoice_logo.jpg',1,1,1);
/*!40000 ALTER TABLE `invoice_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoices` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notes` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `clientid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `projectid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `currencyid` int(11) NOT NULL,
  `due_date` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `tax_name_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tax_rate_1` decimal(10,2) NOT NULL,
  `tax_name_2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tax_rate_2` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_paid` int(11) NOT NULL,
  `paypal_email` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `address_1` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `address_2` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paid_by` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `template` int(11) NOT NULL,
  `stripe` int(11) NOT NULL,
  `time_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `time_date_paid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `checkout2_hash` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `checkout2` int(11) NOT NULL,
  `paypal` int(11) NOT NULL,
  `serviceid` int(11) NOT NULL,
  `guest_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `guest_email` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `paying_accountid` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoices`
--

LOCK TABLES `invoices` WRITE;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
INSERT INTO `invoices` VALUES (1,'service_id_2_0001','KYC Review','<p>This invoice was generated automatically by Services. Once paid, we will begin fulfilling the service for you.</p>\r\n',1,1,7,2,4,1510488676,1510488490,'',0.00,'',0.00,1000.00,'744c2db13fcd8daeacaa0112217336214df3c31e',0,'','','','','','','','','','',0,0,'2017-11-12','2017-11-12','',0,0,2,'Camillo Weridch','camillo@werdich-kisslegg.de',1);
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ip_block`
--

DROP TABLE IF EXISTS `ip_block`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ip_block` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IP` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  `reason` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ip_block`
--

LOCK TABLES `ip_block` WRITE;
/*!40000 ALTER TABLE `ip_block` DISABLE KEYS */;
/*!40000 ALTER TABLE `ip_block` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ipn_log`
--

DROP TABLE IF EXISTS `ipn_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ipn_log` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  `IP` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ipn_log`
--

LOCK TABLES `ipn_log` WRITE;
/*!40000 ALTER TABLE `ipn_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `ipn_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lead_form_fields`
--

DROP TABLE IF EXISTS `lead_form_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lead_form_fields` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `formid` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `required` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `options` varchar(2500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lead_form_fields`
--

LOCK TABLES `lead_form_fields` WRITE;
/*!40000 ALTER TABLE `lead_form_fields` DISABLE KEYS */;
INSERT INTO `lead_form_fields` VALUES (1,1,'Bank name_neu','BIC code',1,2,''),(2,1,'BIC code','',1,1,''),(3,1,'Do you have a KYC - System','',0,5,'Yes,No'),(4,1,'Shareholder','',0,5,'10,20,30,40,50,60,70,80,90,100'),(5,1,'Shell Banks','',1,4,'A,B,C'),(6,4,'Test','Desc 1',0,1,''),(7,4,'Test 2','Desc 2',1,1,''),(8,5,'Bank Name','',0,2,''),(9,5,'Country','',0,3,'Holland, USA, Germany'),(10,5,'Current operations?','',0,5,'Anton, Berta, Emil'),(11,6,'Bank name','',0,2,''),(12,6,'What is your FP?','',0,3,'A, B, C, n/a'),(13,6,'Country of operation','',0,2,''),(14,7,'Is the entity able to issue bearer shares?','',0,4,'yes,no'),(15,7,'Please provide information on the financial institution&#039;s (tax) identification number(s) and related countries','',0,1,''),(16,7,'Is the financial institution publicly listed?','',0,4,'yes,no'),(17,7,'Please provide the required information on any ultimate beneficial owner who maintains more than 10% share, or who controls a 10% or more share, of the financial institution.','',0,1,''),(18,7,'If any of the owners is a legal entity, please provide the required information in the below table. Additionally, please provide full information on shareholder structure in a separate document/respective chart. (All known layers of a buisness structure n','',0,2,''),(19,7,'Please provide full name and position/role of all persons holding senior managment positions/senior managment officials.','',0,2,''),(20,7,'Is the financial institution/one of its beneficial owners or shareholders/senior management officials sanctioned (e.g. US OFAC, UN, EU sanction list, UK HMT or Swiss SECOI?)','',0,4,'yes,no'),(21,7,'If yes, please provide full details.','',0,2,''),(22,7,'Are one or more products/services that the financial institution intends to use subject to sectorial sanctions?','',0,4,'yes,no'),(23,7,'If yes, please provide full details','',0,2,''),(24,7,'Is the financial institution/one of its beneficial owners or shareholders/senior management officials located in/organized under the law of/is operating in Iran, Syria, North Korea, Cuba, Burma (Myanmar) or Sudan?','',0,4,'yes,no'),(25,7,'If yes, please provide full details.','',0,2,''),(26,7,'Is one of the financial institution&#039;s beneficial owners or senior management officials a politicall exposed person (PeP)?','',0,4,'yes,no'),(27,7,'If yes, please provide full details','',0,2,''),(28,7,'Has there been a change of beneficial ownership within the last 6 months?','',0,4,'yes,no'),(29,7,'If yes, please provide full details on sources of wealth in separate documents','',0,1,''),(30,7,'Do you offer bulk cash activities?','',0,5,'yes,no'),(31,7,'Do you offer cash letters/cheque clearings?','',0,4,'yes,no'),(32,7,'Do you offer cash management, incl. deposit accounts?','',0,4,'yes,no'),(33,7,'Do you offer international fund transfers?','',0,4,'yes,no'),(34,7,'Do you offer bonds?','',0,4,'yes,no'),(35,7,'Do you offer credit cards?','yes,no',0,1,''),(36,7,'Do you offer loans?','yes,no',0,1,''),(37,7,'Do you offer money markets?','',0,4,'yes,no'),(38,7,'Do you offer syndicated loans?','',0,4,'yes,no'),(39,7,'Do you offer foreign currency exchanges?','',0,4,'yes,no'),(40,7,'Do you offer insurance?','',0,4,'yes,no'),(41,7,'Do you offer investment advisory/investment banking?','',0,4,'yes,no'),(42,7,'Do you offer Islamic banking?','',0,4,'yes,no'),(43,7,'Do you offer overnight investment accounts (sweep)?','',0,4,'yes,no'),(44,7,'Do you offer any of the following: spots, swaps, options?','',0,4,'yes,no'),(45,7,'Do you offer documentary collections?','',0,4,'yes,no'),(46,7,'Do you offer guarantees?','',0,4,'yes,no'),(47,7,'Do you offer letters of credit?','',0,4,'yes,no'),(48,7,'Do you offer standby letters of credit?','',0,4,'yes,no'),(49,7,'Do you offer mobile banking?','',0,4,'yes,no'),(50,7,'Do you offer online banking?','',0,4,'yes,no'),(51,7,'Do you offer private banking?','',0,4,'yes,no'),(52,7,'Does the entity offer its customers and their beneficial owners to use correspondent banking accounts as downstream accounts? With &quot;downstream accounts&quot; the correspondent bank offers correspondent services to other financial institutions.','',0,4,'yes,no'),(53,7,'Is it possible to open an account without personal contact?','',0,4,'yes,no'),(54,7,'If yes, how do you verify the identity of a customer?','',0,1,''),(55,7,'Which of the following constitute primarily the financial institution&#039;s customer base? Please indicate the share of each customer group that exceeds 10% in absolute and percentage terms. Example: Banks ~5,000/~80%','',0,2,''),(56,7,'Which are the main industry sectors of the entity&#039;s corporate customer base? Please indicate the share of each industry that exceeds 10% in absolute and percentage terms. Example: Manufacturing ~100/~10%','',0,2,''),(57,7,'Does the financial institution frequently conduct transactions which are generally linked to a high business area AML risk (self-assessment of the financial institution based on its own risk classification)?','',0,4,'yes,no'),(58,7,'If yes, please provide full details','',0,1,''),(59,7,'Do you have shell bank customers, off-shore customers, or escrow cumulative accounts?','',0,4,'yes,no'),(60,7,'How does the financial institution perform sanctions screening of all payments?','',0,5,'no screening,automated,semi-automated,manual'),(61,7,'Which vendor is used for sanctions screening and since when is the current screening process in place?','',0,1,''),(62,7,'Has the institution been prosecuted or fined for failure to comply with financial sanctions specifications in the last 5 years?','',0,4,'yes,no');
/*!40000 ALTER TABLE `lead_form_fields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lead_forms`
--

DROP TABLE IF EXISTS `lead_forms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lead_forms` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `welcome` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `assignedid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `collect_user` int(11) NOT NULL,
  `default_statusid` int(11) NOT NULL,
  `default_sourceid` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lead_forms`
--

LOCK TABLES `lead_forms` WRITE;
/*!40000 ALTER TABLE `lead_forms` DISABLE KEYS */;
INSERT INTO `lead_forms` VALUES (6,'CB-KYC Template 2017 (1)','<p>This is a test survey</p>\r\n',1510094170,1,1,0,0,1,4),(7,'CB-KYC Template 2018','<p>This is a questionnaire designed for our&nbsp;correspondent banks. It helps us to comply with anti-money laundering and anti-terrorism financing regulations and financial crime regulations in general.<br />\r\n<br />\r\nWe made a great effort to make this questionnaire as easy to use as possible. If you still experience any trouble, Please contact your relationship manager or use the chat function for support.<br />\r\n<br />\r\nThank you for your cooperation!</p>\r\n',1510261808,1,3,0,1,1,4);
/*!40000 ALTER TABLE `lead_forms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lead_notes`
--

DROP TABLE IF EXISTS `lead_notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lead_notes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `leadid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lead_notes`
--

LOCK TABLES `lead_notes` WRITE;
/*!40000 ALTER TABLE `lead_notes` DISABLE KEYS */;
/*!40000 ALTER TABLE `lead_notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lead_sources`
--

DROP TABLE IF EXISTS `lead_sources`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lead_sources` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lead_sources`
--

LOCK TABLES `lead_sources` WRITE;
/*!40000 ALTER TABLE `lead_sources` DISABLE KEYS */;
INSERT INTO `lead_sources` VALUES (4,'Global Compliance');
/*!40000 ALTER TABLE `lead_sources` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lead_statuses`
--

DROP TABLE IF EXISTS `lead_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lead_statuses` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lead_statuses`
--

LOCK TABLES `lead_statuses` WRITE;
/*!40000 ALTER TABLE `lead_statuses` DISABLE KEYS */;
INSERT INTO `lead_statuses` VALUES (1,'New'),(3,'Updated');
/*!40000 ALTER TABLE `lead_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `live_chat`
--

DROP TABLE IF EXISTS `live_chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `live_chat` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `live_chat`
--

LOCK TABLES `live_chat` WRITE;
/*!40000 ALTER TABLE `live_chat` DISABLE KEYS */;
INSERT INTO `live_chat` VALUES (1,1,1501620656,'');
/*!40000 ALTER TABLE `live_chat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `live_chat_messages`
--

DROP TABLE IF EXISTS `live_chat_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `live_chat_messages` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `chatid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `live_chat_messages`
--

LOCK TABLES `live_chat_messages` WRITE;
/*!40000 ALTER TABLE `live_chat_messages` DISABLE KEYS */;
INSERT INTO `live_chat_messages` VALUES (1,1,1,'hello',1501620656),(2,1,3,'Hello',1501620674),(3,1,1,'Section 1.1.2 stimmt nicht',1501620680),(4,1,3,'oh neiin',1501620686),(5,1,1,'frag doch mal @analyst',1501620691),(6,1,3,'gute idee',1501620705),(7,1,1,'@Test_Analyst',1501620714),(8,1,1,'<i><strong>has left the chat</strong></i>',1501620718);
/*!40000 ALTER TABLE `live_chat_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `live_chat_users`
--

DROP TABLE IF EXISTS `live_chat_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `live_chat_users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `chatid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `unread` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `live_chat_users`
--

LOCK TABLES `live_chat_users` WRITE;
/*!40000 ALTER TABLE `live_chat_users` DISABLE KEYS */;
INSERT INTO `live_chat_users` VALUES (2,1,3,0,0,'Chat with <strong>Camillo_admin</strong>');
/*!40000 ALTER TABLE `live_chat_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_attempts` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IP` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `count` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempts`
--

LOCK TABLES `login_attempts` WRITE;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
INSERT INTO `login_attempts` VALUES (1,'10.240.1.31','Camillo_Werdich',1,1501615464),(2,'10.240.1.67','jan.spoerer@whu.edu',2,1501618767),(3,'10.240.1.31','jan.spoerer@whu.edu',1,1501618776),(4,'10.240.0.224','jan.spoerer@whu.edu',1,1501618863),(5,'10.240.1.45','camillo.werdich@me.com',1,1507380246),(6,'10.240.1.4','cwerdich2',1,1508137309),(7,'10.240.1.31','camillo.werdich@me.com',1,1508137334),(8,'10.240.1.31','camillo.werdich@me.com',1,1510087078),(9,'10.240.1.31','camillo.werdich@me.com',1,1510092328),(10,'10.240.1.184','jan.spoerer@whu.edu',1,1510174215),(11,'10.240.1.67','cwerdich2',1,1510174230),(12,'10.240.0.227','c_admin',1,1510244756),(13,'10.240.1.67','analyst@compex.com',1,1510348559),(14,'10.240.1.97','cwerdich2',1,1518433255),(15,'10.240.0.87','analyst@compex.com',1,1518544833),(16,'10.240.1.99','analyst@compex.com',1,1518544841),(17,'10.240.0.185','Analyst Compex',1,1518705192),(18,'10.240.0.239','analyst@compex.com',1,1519309232);
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mail`
--

DROP TABLE IF EXISTS `mail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mail` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `toid` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  `delete_userid` int(11) NOT NULL,
  `delete_toid` int(11) NOT NULL,
  `replies` int(11) NOT NULL DEFAULT '1',
  `last_reply_timestamp` int(11) NOT NULL,
  `unread_userid` int(11) NOT NULL,
  `unread_toid` int(11) NOT NULL,
  `last_replyid` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `userid` (`userid`),
  KEY `toid` (`toid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mail`
--

LOCK TABLES `mail` WRITE;
/*!40000 ALTER TABLE `mail` DISABLE KEYS */;
INSERT INTO `mail` VALUES (1,1,3,'Test Mail',1506683169,1,0,3,1507363243,0,0,3);
/*!40000 ALTER TABLE `mail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mail_replies`
--

DROP TABLE IF EXISTS `mail_replies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mail_replies` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `mailid` int(11) NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `userid` (`userid`),
  KEY `mailid` (`mailid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mail_replies`
--

LOCK TABLES `mail_replies` WRITE;
/*!40000 ALTER TABLE `mail_replies` DISABLE KEYS */;
INSERT INTO `mail_replies` VALUES (1,1,1,'<p>Hallo Jan, das ist eine Test mail.</p>\r\n\r\n<p>Antworte bitte kurz ob es funktioniert hat..</p>\r\n\r\n<p>Lg, Camillo</p>\r\n',1506683169),(2,3,1,'<p>Hallo Camillo</p>\r\n\r\n<p>&nbsp;</p>\r\n',1507363234),(3,3,1,'<p>Yayy, es klappt</p>\r\n',1507363243);
/*!40000 ALTER TABLE `mail_replies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `projectid` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  `last_updated_timestamp` int(11) NOT NULL,
  `last_updated_userid` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notes`
--

LOCK TABLES `notes` WRITE;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset`
--

DROP TABLE IF EXISTS `password_reset`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  `IP` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset`
--

LOCK TABLES `password_reset` WRITE;
/*!40000 ALTER TABLE `password_reset` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paying_accounts`
--

DROP TABLE IF EXISTS `paying_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paying_accounts` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paypal_email` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `stripe_secret_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stripe_publishable_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `checkout2_account_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `checkout2_secret_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_line_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_line_2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paying_accounts`
--

LOCK TABLES `paying_accounts` WRITE;
/*!40000 ALTER TABLE `paying_accounts` DISABLE KEYS */;
INSERT INTO `paying_accounts` VALUES (1,'Jan&#039;s Account','jan.spoerer@whu.edu','','','','','Hermann-Löns-Straße 5','','Netphen','NRW','57250','Germany','Jan','Spörer');
/*!40000 ALTER TABLE `paying_accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_logs`
--

DROP TABLE IF EXISTS `payment_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_logs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `email` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `invoiceid` int(11) NOT NULL,
  `processor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_logs`
--

LOCK TABLES `payment_logs` WRITE;
/*!40000 ALTER TABLE `payment_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_plans`
--

DROP TABLE IF EXISTS `payment_plans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_plans` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hexcolor` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `fontcolor` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `days` int(11) NOT NULL,
  `sales` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_plans`
--

LOCK TABLES `payment_plans` WRITE;
/*!40000 ALTER TABLE `payment_plans` DISABLE KEYS */;
INSERT INTO `payment_plans` VALUES (2,'BASIC','68aa9b','FFFFFF',3.00,30,6,'This is the basic plan which gives you a introduction to our Premium Plans'),(3,'Professional','416375','FFFFFF',7.99,90,3,'Get all the benefits of basic at a cheaper price and gain content for longer.'),(4,'LIFETIME','578465','FFFFFF',300.00,0,1,'Become a premium member for life and have access to all our premium content.');
/*!40000 ALTER TABLE `payment_plans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile_comments`
--

DROP TABLE IF EXISTS `profile_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profile_comments` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `profileid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile_comments`
--

LOCK TABLES `profile_comments` WRITE;
/*!40000 ALTER TABLE `profile_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `profile_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_categories`
--

DROP TABLE IF EXISTS `project_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_categories` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_categories`
--

LOCK TABLES `project_categories` WRITE;
/*!40000 ALTER TABLE `project_categories` DISABLE KEYS */;
INSERT INTO `project_categories` VALUES (6,'In Progress','4BC94B'),(7,'Completed','28aac2'),(8,'Cancelled','da2222');
/*!40000 ALTER TABLE `project_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_chat`
--

DROP TABLE IF EXISTS `project_chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_chat` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `projectid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_chat`
--

LOCK TABLES `project_chat` WRITE;
/*!40000 ALTER TABLE `project_chat` DISABLE KEYS */;
/*!40000 ALTER TABLE `project_chat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_file_notes`
--

DROP TABLE IF EXISTS `project_file_notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_file_notes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `fileid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_file_notes`
--

LOCK TABLES `project_file_notes` WRITE;
/*!40000 ALTER TABLE `project_file_notes` DISABLE KEYS */;
/*!40000 ALTER TABLE `project_file_notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_files`
--

DROP TABLE IF EXISTS `project_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_files` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `projectid` int(11) NOT NULL DEFAULT '0',
  `userid` int(11) NOT NULL DEFAULT '0',
  `folder_flag` int(11) NOT NULL DEFAULT '0',
  `file_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `extension` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `file_size` int(11) NOT NULL,
  `file_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `folder_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `folder_parent` int(11) NOT NULL,
  `file_url` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  `upload_file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_files`
--

LOCK TABLES `project_files` WRITE;
/*!40000 ALTER TABLE `project_files` DISABLE KEYS */;
INSERT INTO `project_files` VALUES (1,7,7,1,'2017','',0,'Folder','',0,'',1510347052,''),(3,7,3,0,'Annual Report Credit Suisse 2016','',0,'External URL','',1,'https://www.credit-suisse.com/media/assets/corporate/docs/about-us/investor-relations/financial-disclosures/financial-reports/csg-ar-2016-en.pdf',1518526663,''),(4,9,3,1,'2018','',0,'Folder','',0,'',1518527126,''),(5,9,3,0,'UBS 2017 Q4 Report','',0,'External URL','',4,'https://www.static-ubs.com/global/en/about_ubs/investor_relations/shared/quarterlies/2017/4q17/_jcr_content/par/columncontrol/col1/linklist/link.0312383477.file/bGluay9wYXRoPS9jb250ZW50L2RhbS9zdGF0aWMvcXVhcnRlcmxpZXMvMjAxNy80cTE3L2Z1bGwtcmVwb3J0LXVicy1ncm91cC1hZy1jb25zb2xpZGF0ZWQtNHExNy5wZGY=/full-report-ubs-group-ag-consolidated-4q17.pdf',1518527144,''),(6,9,3,0,'UBS 2017 Q3 Report','',0,'External URL','',4,'https://www.static-ubs.com/global/en/about_ubs/investor_relations/shared/quarterlies/2017/3q17/_jcr_content/par/columncontrol/col1/linklist/link.1827014003.file/bGluay9wYXRoPS9jb250ZW50L2RhbS9zdGF0aWMvcXVhcnRlcmxpZXMvMjAxNy8zcTE3L2Z1bGwtcmVwb3J0LXVicy1ncm91cC1hZy1jb25zb2xpZGF0ZWQtM3ExNy5wZGY=/full-report-ubs-group-ag-consolidated-3q17.pdf',1518527216,''),(7,9,3,0,'UBS 2017 Q2 Report','',0,'External URL','',4,'https://www.static-ubs.com/global/en/about_ubs/investor_relations/shared/quarterlies/2017/2q17/_jcr_content/par/columncontrol/col1/linklist/link.1486403139.file/bGluay9wYXRoPS9jb250ZW50L2RhbS9zdGF0aWMvcXVhcnRlcmxpZXMvMjAxNy8ycTE3L2Z1bGwtcmVwb3J0LXVicy1ncm91cC1hZy1jb25zb2xpZGF0ZWQtMnExNy5wZGY=/full-report-ubs-group-ag-consolidated-2q17.pdf',1518527274,''),(8,9,3,0,'UBS 2017 Q1 Report','',0,'External URL','',4,'https://www.static-ubs.com/global/en/about_ubs/investor_relations/shared/quarterlies/2017/1q17/_jcr_content/par/columncontrol/col1/linklist/link.0649116398.file/bGluay9wYXRoPS9jb250ZW50L2RhbS9zdGF0aWMvcXVhcnRlcmxpZXMvMjAxNy8xcTE3LzFxMTctZmluYW5jaWFsLXJlcG9ydC5wZGY=/1q17-financial-report.pdf',1518527311,''),(9,9,3,0,'Credit Suisse 2017 Q3 Report','',0,'External URL','',4,'https://www.credit-suisse.com/media/assets/corporate/docs/about-us/investor-relations/financial-disclosures/results/csg-financialreport-3q17.pdf',1518527463,''),(10,9,3,0,'Credit Suisse 2017 Q2 Report','',0,'External URL','',4,'https://www.credit-suisse.com/media/assets/corporate/docs/about-us/investor-relations/financial-disclosures/results/csg-financialreport-2q17.pdf',1518527537,''),(11,9,3,0,'Credit Suisse 2017 Q1 Report','',0,'External URL','',4,'https://www.credit-suisse.com/media/assets/corporate/docs/about-us/investor-relations/financial-disclosures/results/csg-financialreport-1q17.pdf',1518527565,''),(12,9,1,0,'2016 - Sparkasse','.pdf',1599,'application/pdf','',4,'',1519943223,'cac49c15c6686ebcd9ad9e80bc6c243b.pdf');
/*!40000 ALTER TABLE `project_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_members`
--

DROP TABLE IF EXISTS `project_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_members` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `projectid` int(11) NOT NULL,
  `roleid` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_members`
--

LOCK TABLES `project_members` WRITE;
/*!40000 ALTER TABLE `project_members` DISABLE KEYS */;
INSERT INTO `project_members` VALUES (1,1,1,1),(2,3,1,6),(4,4,1,2),(5,1,2,1),(6,5,2,2),(7,1,3,1),(8,1,4,1),(9,5,3,10),(10,6,5,1),(11,1,6,1),(12,1,7,1),(13,3,7,1),(14,1,8,1),(15,3,8,1),(16,5,7,1),(17,4,8,13),(18,7,7,13),(19,1,8,1),(20,1,9,1),(21,3,9,1),(22,7,9,13),(23,8,9,1),(24,8,7,1),(25,8,10,1);
/*!40000 ALTER TABLE `project_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_roles`
--

DROP TABLE IF EXISTS `project_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_roles` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin` int(11) NOT NULL,
  `team` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `file` int(11) NOT NULL,
  `task` int(11) NOT NULL,
  `calendar` int(11) NOT NULL,
  `finance` int(11) NOT NULL,
  `notes` int(11) NOT NULL,
  `reports` int(11) NOT NULL,
  `client` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_roles`
--

LOCK TABLES `project_roles` WRITE;
/*!40000 ALTER TABLE `project_roles` DISABLE KEYS */;
INSERT INTO `project_roles` VALUES (1,'Admin',1,0,0,0,0,0,0,0,0,0),(2,'Team',0,1,0,0,0,0,0,0,0,0),(4,'Time',0,0,1,0,0,0,0,0,0,0),(5,'File Manager',0,0,0,1,0,0,0,0,0,0),(6,'Task Manager',0,0,0,0,1,0,0,0,0,0),(7,'Calendar Manager',0,0,0,0,0,1,0,0,0,0),(8,'Finance Manager',0,0,0,0,0,0,1,0,0,0),(9,'Notes',0,0,0,0,0,0,0,1,0,0),(10,'Worker',0,1,1,1,1,1,1,1,1,0),(11,'Reports',0,0,0,0,0,0,0,0,1,0),(12,'Client',0,0,0,0,0,0,0,0,0,1),(13,'Analyst',0,0,0,1,1,1,0,0,1,0);
/*!40000 ALTER TABLE `project_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_task_files`
--

DROP TABLE IF EXISTS `project_task_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_task_files` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `taskid` int(11) NOT NULL,
  `fileid` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_task_files`
--

LOCK TABLES `project_task_files` WRITE;
/*!40000 ALTER TABLE `project_task_files` DISABLE KEYS */;
INSERT INTO `project_task_files` VALUES (2,30,3),(3,35,9),(4,35,11),(5,35,10),(6,35,12);
/*!40000 ALTER TABLE `project_task_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_task_members`
--

DROP TABLE IF EXISTS `project_task_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_task_members` (
  `iD` int(11) NOT NULL AUTO_INCREMENT,
  `taskid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`iD`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_task_members`
--

LOCK TABLES `project_task_members` WRITE;
/*!40000 ALTER TABLE `project_task_members` DISABLE KEYS */;
INSERT INTO `project_task_members` VALUES (1,1,1),(2,1,3),(3,1,4),(4,2,3),(5,3,1),(6,4,1),(7,4,5),(8,3,5),(9,5,1),(10,6,1),(11,7,1),(12,8,1),(13,6,5),(14,9,6),(15,10,6),(16,11,6),(17,12,6),(18,13,6),(19,14,6),(20,15,6),(21,16,1),(22,16,5),(23,17,6),(24,18,1),(25,19,1),(26,20,1),(27,21,1),(28,22,1),(29,23,1),(30,24,1),(31,25,1),(32,26,1),(34,27,3),(35,28,1),(36,28,3),(37,29,1),(38,29,3),(39,29,4),(40,27,7),(41,25,7),(43,30,3),(44,30,7),(45,31,3),(46,32,1),(47,32,3),(48,32,7),(49,33,1),(50,33,3),(51,34,3),(52,34,1),(53,35,1),(54,35,3),(55,35,7),(56,36,8),(57,37,1),(58,37,3);
/*!40000 ALTER TABLE `project_task_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_task_messages`
--

DROP TABLE IF EXISTS `project_task_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_task_messages` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `taskid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_task_messages`
--

LOCK TABLES `project_task_messages` WRITE;
/*!40000 ALTER TABLE `project_task_messages` DISABLE KEYS */;
INSERT INTO `project_task_messages` VALUES (1,28,1,'<p>Diese Bank ist super!</p>\r\n',1510259683),(2,28,1,'<p>Funktioniert :)</p>\r\n',1510305209),(3,26,1,'<p>test note</p>\r\n',1510340234);
/*!40000 ALTER TABLE `project_task_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_task_objective_members`
--

DROP TABLE IF EXISTS `project_task_objective_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_task_objective_members` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `objectiveid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_task_objective_members`
--

LOCK TABLES `project_task_objective_members` WRITE;
/*!40000 ALTER TABLE `project_task_objective_members` DISABLE KEYS */;
INSERT INTO `project_task_objective_members` VALUES (1,1,3),(8,4,1),(9,4,5),(10,3,1),(11,5,1);
/*!40000 ALTER TABLE `project_task_objective_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_task_objectives`
--

DROP TABLE IF EXISTS `project_task_objectives`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_task_objectives` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `taskid` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `complete` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_task_objectives`
--

LOCK TABLES `project_task_objectives` WRITE;
/*!40000 ALTER TABLE `project_task_objectives` DISABLE KEYS */;
INSERT INTO `project_task_objectives` VALUES (1,1,'Not sure about section 2.1.5','<p>The information is incomplete</p>\r\n',1501620546,4,1),(2,1,'ausfüölölen','',1502299971,1,1),(3,6,'Test frage','<p>Antwort bla</p>\r\n',1506847937,1,1),(4,6,'Test Frage 2','<p>Antwort2</p>\r\n\r\n<p>&nbsp;</p>\r\n',1506847962,1,1),(5,6,'Test Frage 3','<p>Antowet</p>\r\n',1506847969,1,1),(6,9,'Objective TEst','<p>Blabla</p>\r\n',1508009659,6,0);
/*!40000 ALTER TABLE `project_task_objectives` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_task_to_user_lead`
--

DROP TABLE IF EXISTS `project_task_to_user_lead`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_task_to_user_lead` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `taskid` int(11) NOT NULL,
  `formid` int(11) NOT NULL,
  `hash` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_task_to_user_lead`
--

LOCK TABLES `project_task_to_user_lead` WRITE;
/*!40000 ALTER TABLE `project_task_to_user_lead` DISABLE KEYS */;
INSERT INTO `project_task_to_user_lead` VALUES (1,9,4,'AABBCCDDEEFF'),(2,10,4,'3527ebc99d42bfc58da73b3afdb03e3a'),(8,16,1,'d9cffea992a9e20f4e5a6cd36cd8bea1'),(9,17,4,'135a41ab078d3ad8f46fba31d7835102'),(10,18,1,'5427153dbfa94b87a7a53d06e971b546'),(11,19,2,'19684436e30e84ddff3bb15b5c786c3e'),(12,20,1,'c20712d115a8f495ce1d5359ee2c2d6b'),(13,21,5,'5d50cbfa4558ba0d742a534cd23aa2e5'),(14,22,5,'0a7d4061fd7d9db996a83d4484ba217e'),(15,23,5,'e5e82f5ff330ed28801aab529b3f6d5a'),(16,24,5,'079e77509d8a85053da26750ce90ba60'),(17,25,6,'b6d7db24b252622807bdbba7c66d3992'),(18,26,6,'60100341ccfe28cd33e5ebde43b9ab6e'),(19,27,6,'e90dbe357df34053b44b2d93ae06436b'),(20,28,6,'ce8468acb9e47d3e1edfbf11901a7438'),(21,29,6,'9695e069a3114f9943c4a0d8eabe2ce7'),(22,30,7,'fbc85a26cdd9febde6864c1d42b5aba1'),(24,32,7,'dcd71e0a0323eb362c537c76fc895995'),(25,33,6,'a04f0843e964fb8212c4a0c6fe892ff0'),(26,34,7,'2730189462a337828082aa1db6447943'),(27,35,7,'6145cc7364852d1d9778141b59018901'),(28,36,7,'8904996defaa4cb335174db4801812d5'),(29,37,7,'8d00e23c2e00596243ce4dbc461ecd33');
/*!40000 ALTER TABLE `project_task_to_user_lead` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_tasks`
--

DROP TABLE IF EXISTS `project_tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_tasks` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `projectid` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `start_date` int(11) NOT NULL,
  `due_date` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `complete` int(11) NOT NULL,
  `complete_sync` int(11) NOT NULL DEFAULT '1',
  `archived` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_tasks`
--

LOCK TABLES `project_tasks` WRITE;
/*!40000 ALTER TABLE `project_tasks` DISABLE KEYS */;
INSERT INTO `project_tasks` VALUES (1,1,'First Review','\r\n<div id=\"c1\">\r\n    Fill out my <a href=\"https://project-compex-cwerdich.c9users.io/app/app/form?id=1\">online form</a>.\r\n</div>\r\n\r\n    (function(d, t) {\r\n        var s = d.createElement(t), options = {\r\n            \'id\': 1,\r\n            \'container\': \'c1\',\r\n            \'height\': \'667px\',\r\n            \'form\': \'//project-compex-cwerdich.c9users.io/app/app/embed\'\r\n        };\r\n        s.type= \'text/javascript\';\r\n        s.src = \'https://project-compex-cwerdich.c9users.io/app/static_files/js/form.widget.js\';\r\n        s.onload = s.onreadystatechange = function() {\r\n            var rs = this.readyState; if (rs) if (rs != \'complete\') if (rs != \'loaded\') return;\r\n            try { (new EasyForms()).initialize(options).display() } catch (e) { }\r\n        };\r\n        var scr = d.getElementsByTagName(t)[0], par = scr.parentNode; par.insertBefore(s, scr);\r\n    })(document, \'script\');\r\n\r\n',1507397862,63462,3,1,100,1,0),(2,1,'Test_2','',1501707314,1502484914,1,3,0,1,0),(6,3,'Deutsche Bank','<p>Plese fill out the following&nbsp; <a href=\"https://project-compex-cwerdich.c9users.io/crm/index.php/leads/view_form_full/1\">Fragebogen</a></p>\r\n',1506934861,1509440461,3,1,100,1,0),(7,3,'UBS Switzerland','<p>Plese fill out the following&nbsp; <a href=\"https://project-compex-cwerdich.c9users.io/crm/index.php/leads/view_form_full/1\">Fragebogen</a></p>\r\n',1509440178,1510736178,1,1,0,1,0),(8,3,'Commerzbank AG','<p>Plese fill out the following&nbsp; <a href=\"https://project-compex-cwerdich.c9users.io/crm/index.php/leads/view_form_full/1\">Fragebogen</a></p>\r\n',1506934622,1509440222,1,1,0,1,0),(9,5,'Bank 1','<p>Bla bla</p>\r\n',1508007819,1539198219,3,6,100,1,0),(10,5,'Bank 2','',1508095640,70040,3,6,100,1,0),(12,3,'test 5','',1508065421,0,1,6,0,1,0),(16,3,'UBS Switzerland Germany','',1508137497,1509433497,1,1,0,1,0),(17,5,'Bank 3','<p>Bank3 Beschreibung</p>\r\n',1509909888,69888,1,6,0,1,0),(18,4,'TEST Bank 10','',1511895118,1512067918,3,1,100,1,0),(19,4,'Bank test 11','',1510685665,1511981665,1,1,0,1,0),(20,3,'Test Camillo','',1510169443,1510774243,1,1,0,1,0),(21,4,'Camillo test v_2','',1509996950,70550,1,1,66,1,0),(22,6,'UBS Switzerland','',1509575692,1512081292,1,1,66,1,1),(23,6,'Marianas Bank','',1509575104,1510784704,3,1,100,1,0),(24,6,'test  3','',1510094229,81429,1,1,66,1,0),(25,7,'Rabobank Netherlands','',1510136301,1512037101,3,1,100,1,0),(26,7,'UBS Switzerland','',1509561232,1509474832,2,1,33,1,0),(27,7,'Commerzbank AG','',1510670873,1511362073,1,1,8,0,0),(28,7,'Schwyzer Kantonalbank','',1510237269,1513952469,3,1,100,1,1),(29,8,'test bank 1','',1510339852,1511635852,1,1,0,1,0),(30,7,'Credit Suisse','',1511189263,1511621263,1,1,2,0,0),(32,7,'Hypo Real Estate','',1519138036,1519829236,1,1,44,0,0),(33,9,'Commerzbank AG','<p>This year 2018 we conduct CDD</p>\r\n',1519812715,1524132715,3,1,100,0,0),(34,9,'DZ Bank','',1514825037,1546274637,1,3,4,0,0),(35,9,'Credit Suisse','',1518603514,1519121914,1,1,0,1,0),(36,10,'Bar','',1518696076,1519819276,1,8,0,1,0),(37,9,'Rabobank Netherlands','',1518699972,1519736772,1,1,0,1,0);
/*!40000 ALTER TABLE `project_tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userid` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `catid` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `calendar_id` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `calendar_color` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `complete` int(11) NOT NULL,
  `complete_sync` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (7,'KYC 2017','default.png',3,'<p>This is a test project</p>\r\n',6,1518519792,0,'','FD7D82',47,1),(9,'KYC 2018','default.png',1,'',6,1518433744,0,'','FD7D82',26,1),(10,'Foo','default.png',8,'',6,1518696044,0,'','FD7D82',0,1);
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reset_log`
--

DROP TABLE IF EXISTS `reset_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reset_log` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IP` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reset_log`
--

LOCK TABLES `reset_log` WRITE;
/*!40000 ALTER TABLE `reset_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `reset_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service_form_fields`
--

DROP TABLE IF EXISTS `service_form_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service_form_fields` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `formid` int(11) NOT NULL,
  `title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `required` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `options` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service_form_fields`
--

LOCK TABLES `service_form_fields` WRITE;
/*!40000 ALTER TABLE `service_form_fields` DISABLE KEYS */;
/*!40000 ALTER TABLE `service_form_fields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service_forms`
--

DROP TABLE IF EXISTS `service_forms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service_forms` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `welcome` text COLLATE utf8_unicode_ci NOT NULL,
  `userid` int(11) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `invoice` int(11) NOT NULL,
  `currencyid` int(11) NOT NULL,
  `invoice_message` text COLLATE utf8_unicode_ci NOT NULL,
  `require_login` int(11) NOT NULL,
  `paying_accountid` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service_forms`
--

LOCK TABLES `service_forms` WRITE;
/*!40000 ALTER TABLE `service_forms` DISABLE KEYS */;
INSERT INTO `service_forms` VALUES (1,'Test 1','<p>Test Service</p>\r\n',1,100.00,1,4,'<p>This invoice was generated automatically by Services. Once paid, we will begin fulfilling the service for you.</p>\r\n',1,1),(2,'KYC Review','<p>This is a test service</p>\r\n',3,1000.00,1,4,'<p>This invoice was generated automatically by Services. Once paid, we will begin fulfilling the service for you.</p>\r\n',0,1);
/*!40000 ALTER TABLE `service_forms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_layouts`
--

DROP TABLE IF EXISTS `site_layouts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_layouts` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `layout_path` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_layouts`
--

LOCK TABLES `site_layouts` WRITE;
/*!40000 ALTER TABLE `site_layouts` DISABLE KEYS */;
INSERT INTO `site_layouts` VALUES (1,'Basic','layout/themes/layout.php'),(2,'Titan','layout/themes/titan_layout.php'),(3,'Dark Fire','layout/themes/dark_fire_layout.php'),(4,'Light Blue','layout/themes/light_blue_layout.php');
/*!40000 ALTER TABLE `site_layouts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_settings`
--

DROP TABLE IF EXISTS `site_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_settings` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `site_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `site_desc` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `upload_path` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `upload_path_relative` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `site_email` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `site_logo` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'logo.png',
  `register` int(11) NOT NULL,
  `disable_captcha` int(11) NOT NULL,
  `date_format` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `avatar_upload` int(11) NOT NULL DEFAULT '1',
  `file_types` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `twitter_consumer_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `twitter_consumer_secret` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `disable_social_login` int(11) NOT NULL,
  `facebook_app_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `facebook_app_secret` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `google_client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `google_client_secret` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_size` int(11) NOT NULL,
  `paypal_email` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `paypal_currency` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'USD',
  `payment_enabled` int(11) NOT NULL,
  `payment_symbol` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '$',
  `global_premium` int(11) NOT NULL,
  `calendar_type` int(11) NOT NULL,
  `google_calendar_id` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `calendar_timezone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `google_calendar_api_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `disable_ticket_upload` int(11) NOT NULL,
  `protocol` int(11) NOT NULL,
  `protocol_path` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `protocol_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `protocol_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ticket_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `protocol_ssl` int(11) NOT NULL,
  `login_protect` int(11) NOT NULL,
  `activate_account` int(11) NOT NULL,
  `fp_currency_symbol` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `enable_calendar` int(11) NOT NULL,
  `enable_tasks` int(11) NOT NULL,
  `enable_files` int(11) NOT NULL,
  `enable_team` int(11) NOT NULL,
  `enable_time` int(11) NOT NULL,
  `enable_tickets` int(11) NOT NULL,
  `enable_finance` int(11) NOT NULL,
  `enable_invoices` int(11) NOT NULL,
  `enable_notes` int(11) NOT NULL,
  `enable_leads` int(11) NOT NULL,
  `default_user_role` int(11) NOT NULL,
  `install` int(11) NOT NULL,
  `secure_login` int(11) NOT NULL DEFAULT '1',
  `enable_reports` int(11) NOT NULL DEFAULT '1',
  `date_picker_format` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'd/m/Y',
  `calendar_picker_format` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `google_recaptcha_secret` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `google_recaptcha_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `google_recaptcha` int(11) NOT NULL,
  `logo_option` int(11) NOT NULL,
  `enable_services` int(11) NOT NULL,
  `layout` varchar(500) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'layout/themes/titan_layout.php',
  `cache_time` int(11) NOT NULL DEFAULT '3600',
  `imap_ticket_string` varchar(500) COLLATE utf8_unicode_ci NOT NULL DEFAULT '## Ticket ID:',
  `imap_reply_string` varchar(500) COLLATE utf8_unicode_ci NOT NULL DEFAULT '## - REPLY ABOVE THIS LINE - ##',
  `profile_comments` int(11) NOT NULL,
  `client_user_role` int(11) NOT NULL,
  `enable_chat` int(11) NOT NULL DEFAULT '1',
  `chat_update` int(11) NOT NULL DEFAULT '5000',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_settings`
--

LOCK TABLES `site_settings` WRITE;
/*!40000 ALTER TABLE `site_settings` DISABLE KEYS */;
INSERT INTO `site_settings` VALUES (1,'Sinpex','Welcome to Compex','/home/ubuntu/workspace/crm/uploads','uploads','test@test.com','logo.png',0,1,'d/m/Y h:i',1,'gif|png|jpg|jpeg|pdf','','',0,'','','','',4096,'','USD',1,'$',0,0,'','Europe/London','',1,1,'','','','PMS TIcket',1,1,0,'$',1,1,1,1,1,0,0,0,0,1,7,0,1,1,'m/d/Y','Y/m/d H:i','','',0,0,0,'layout/themes/titan_layout.php',3600,'## Ticket ID:','## - REPLY ABOVE THIS LINE - ##',1,11,1,5000);
/*!40000 ALTER TABLE `site_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket_category_groups`
--

DROP TABLE IF EXISTS `ticket_category_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ticket_category_groups` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `catid` int(11) NOT NULL,
  `groupid` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket_category_groups`
--

LOCK TABLES `ticket_category_groups` WRITE;
/*!40000 ALTER TABLE `ticket_category_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `ticket_category_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket_custom_field_data`
--

DROP TABLE IF EXISTS `ticket_custom_field_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ticket_custom_field_data` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ticketid` int(11) NOT NULL,
  `fieldid` int(11) NOT NULL,
  `value` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket_custom_field_data`
--

LOCK TABLES `ticket_custom_field_data` WRITE;
/*!40000 ALTER TABLE `ticket_custom_field_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `ticket_custom_field_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket_custom_fields`
--

DROP TABLE IF EXISTS `ticket_custom_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ticket_custom_fields` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `help_text` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `select_options` varchar(1500) COLLATE utf8_unicode_ci NOT NULL,
  `required` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket_custom_fields`
--

LOCK TABLES `ticket_custom_fields` WRITE;
/*!40000 ALTER TABLE `ticket_custom_fields` DISABLE KEYS */;
INSERT INTO `ticket_custom_fields` VALUES (1,'Bankname?','',1,'',1);
/*!40000 ALTER TABLE `ticket_custom_fields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket_departments`
--

DROP TABLE IF EXISTS `ticket_departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ticket_departments` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket_departments`
--

LOCK TABLES `ticket_departments` WRITE;
/*!40000 ALTER TABLE `ticket_departments` DISABLE KEYS */;
INSERT INTO `ticket_departments` VALUES (1,'Default','');
/*!40000 ALTER TABLE `ticket_departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket_files`
--

DROP TABLE IF EXISTS `ticket_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ticket_files` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ticketid` int(11) NOT NULL,
  `upload_file_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `file_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `extension` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `file_size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  `replyid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket_files`
--

LOCK TABLES `ticket_files` WRITE;
/*!40000 ALTER TABLE `ticket_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `ticket_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket_replies`
--

DROP TABLE IF EXISTS `ticket_replies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ticket_replies` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ticketid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `body` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  `replyid` int(11) NOT NULL,
  `files` int(11) NOT NULL,
  `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket_replies`
--

LOCK TABLES `ticket_replies` WRITE;
/*!40000 ALTER TABLE `ticket_replies` DISABLE KEYS */;
/*!40000 ALTER TABLE `ticket_replies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tickets` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `departmentid` int(11) NOT NULL,
  `title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `body` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `assignedid` int(11) NOT NULL,
  `last_reply_userid` int(11) NOT NULL,
  `last_reply_timestamp` int(11) NOT NULL,
  `priority` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `notes` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `message_id_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ticket_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `close_ticket_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_action_log`
--

DROP TABLE IF EXISTS `user_action_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_action_log` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `projectid` int(11) NOT NULL,
  `message` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `IP` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  `url` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `taskid` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=305 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_action_log`
--

LOCK TABLES `user_action_log` WRITE;
/*!40000 ALTER TABLE `user_action_log` DISABLE KEYS */;
INSERT INTO `user_action_log` VALUES (1,1,1,'created a new project <b>First Review</b>.','10.240.1.18',1501618646,'projects',0),(2,1,0,'updated a Team Role <b>Client</b>.','10.240.1.31',1501619290,'team/roles',0),(3,1,1,'added a new user <b>janspoerer</b> to a project.','10.240.1.31',1501619312,'team',0),(4,1,1,'created a new task: First Reviewfor project First Review','10.240.1.14',1501619342,'tasks/view_task/1',1),(5,1,1,'updated a Team Member <b>janspoerer</b> for a project.','10.240.1.14',1501619450,'team',0),(6,1,1,'added a new user <b>Test_Analyst</b> to a project.','10.240.0.189',1501620268,'team',0),(7,1,1,'added a new user <b>Test_Analyst</b> to a task: <a href=\'https://project-compex-cwerdich.c9users.io/crm/index.php/tasks/view/1\'>First Review</a>','10.240.1.4',1501620281,'tasks/view/1',1),(8,4,1,'modified a taskFirst Reviewfor project First Review','10.240.1.18',1501620516,'tasks/view/1',1),(9,4,1,'modified a taskFirst Reviewfor project First Review','10.240.0.224',1501620522,'tasks/view/1',1),(10,4,1,'added a new objective <b>Not sure about section 2.1.5</b> to a task: <a href=\'https://project-compex-cwerdich.c9users.io/crm/index.php/tasks/view/1\'>First Review</a>','10.240.0.189',1501620546,'tasks/view/1',1),(11,3,1,'created a new task: Test_2for project First Review','10.240.1.67',1501620914,'tasks/view_task/2',2),(12,1,1,'updated a project <b>First Review</b>.','10.240.1.14',1502299333,'projects',0),(13,1,1,'marked an new objective <b>Not sure about section 2.1.5</b>as complete!','10.240.1.14',1502299433,'tasks/view/1',1),(14,1,1,'added a new objective <b>ausfüölölen</b> to a task: <a href=\'https://project-compex-cwerdich.c9users.io/crm/index.php/tasks/view/1\'>First Review</a>','10.240.1.31',1502299971,'tasks/view/1',1),(15,1,1,'modified a taskFirst Reviewfor project First Review','10.240.1.14',1502300262,'tasks/view/1',1),(16,1,1,'marked an new objective <b>ausfüölölen</b>as complete!','10.240.0.189',1503303736,'tasks/view/1',1),(17,1,1,'updated a Team Member <b>Test_Analyst</b> for a project.','10.240.1.4',1505051297,'team',0),(18,1,1,'removed a Team Member <b>Test_Analyst</b> for a project.','10.240.1.18',1505051307,'team',0),(19,1,1,'added a new user <b>Test_Analyst</b> to a project.','10.240.1.4',1505051331,'team',0),(20,1,1,'deleted a project <b>First Review</b>.','10.240.1.18',1505051452,'projects',0),(21,1,2,'created a new project <b>UBS Switzerland</b>.','10.240.1.31',1505051742,'projects',0),(22,1,2,'added a new user <b>Test_Analyst_Frankfurt</b> to a project.','10.240.1.4',1505052017,'team',0),(23,1,2,'updated a project <b>UBS Switzerland</b>.','10.240.1.4',1505052117,'projects',0),(24,1,2,'created a new task: Bank Namefor project UBS Switzerland','10.240.0.224',1505052143,'tasks/view_task/3',3),(25,1,2,'created a new task: BICfor project UBS Switzerland','10.240.1.18',1505052163,'tasks/view_task/4',4),(26,1,2,'modified a taskBICfor project UBS Switzerland','10.240.0.189',1505052246,'tasks/view_task/4',4),(27,1,2,'modified a taskBank Namefor project UBS Switzerland','10.240.0.224',1505052262,'tasks/view_task/3',3),(28,1,2,'added a new user <b>Test_Analyst_Frankfurt</b> to a task: <a href=\'https://project-compex-cwerdich.c9users.io/crm/index.php/tasks/view/4\'>BIC</a>','10.240.0.224',1505052282,'tasks/view/4',4),(29,1,2,'added a new user <b>Test_Analyst_Frankfurt</b> to a task: <a href=\'https://project-compex-cwerdich.c9users.io/crm/index.php/tasks/view/3\'>Bank Name</a>','10.240.0.189',1505052301,'tasks/view/3',3),(30,1,3,'created a new project <b>Deutsche Bank Germany</b>.','10.240.0.189',1505053009,'projects',0),(31,1,3,'created a new task: bicfor project Deutsche Bank Germany','10.240.1.45',1506680177,'tasks/view_task/5',5),(32,1,0,'uploaded a new file to the File Manager view: <a href=\'https://project-compex-cwerdich.c9users.io/crm/index.php/files/view_file/1\'>Click here</a>','10.240.0.189',1506682182,'files',0),(33,1,0,'added a new ticket custom field.','10.240.1.45',1506682505,'tickets/custom',0),(34,1,3,'updated a folder on the File Manager view: <a href=\'https://project-compex-cwerdich.c9users.io/crm/index.php/files/view_file/1\'>Click here</a>','10.240.0.224',1506684722,'files',0),(35,1,3,'updated a project <b>Deutsche Bank Germany</b>.','10.240.0.224',1506708278,'projects',0),(36,1,3,'updated a project <b>Deutsche Bank Germany</b>.','10.240.1.18',1506708554,'projects',0),(37,1,3,'updated a project <b>Deutsche Bank Germany</b>.','10.240.0.224',1506708619,'projects',0),(38,1,3,'created a new task: Onboardingfor project Deutsche Bank Germany','10.240.1.67',1506847820,'tasks/view_task/6',6),(39,1,3,'added a new objective <b>Test frage</b> to a task: <a href=\'https://project-compex-cwerdich.c9users.io/crm/index.php/tasks/view/6\'>Onboarding</a>','10.240.1.31',1506847937,'tasks/view/6',6),(40,1,3,'marked an new objective <b>Test frage</b>as complete!','10.240.0.189',1506847943,'tasks/view/6',6),(41,1,3,'modified an objective: <b>Test frage</b>','10.240.1.31',1506847954,'tasks/view/6',6),(42,1,3,'added a new objective <b>Test Frage 2</b> to a task: <a href=\'https://project-compex-cwerdich.c9users.io/crm/index.php/tasks/view/6\'>Onboarding</a>','10.240.1.14',1506847962,'tasks/view/6',6),(43,1,3,'added a new objective <b>Test Frage 3</b> to a task: <a href=\'https://project-compex-cwerdich.c9users.io/crm/index.php/tasks/view/6\'>Onboarding</a>','10.240.1.31',1506847969,'tasks/view/6',6),(44,1,3,'modified an objective: <b>Test Frage 2</b>','10.240.0.189',1506847976,'tasks/view/6',6),(45,1,3,'modified an objective: <b>Test Frage 3</b>','10.240.1.18',1506847983,'tasks/view/6',6),(46,1,2,'deleted a task: Bank Name','10.240.1.18',1506848009,'tasks',3),(47,1,3,'deleted a task: bic','10.240.1.14',1506848012,'tasks',5),(48,1,2,'deleted a task: BIC','10.240.0.224',1506848016,'tasks',4),(49,1,3,'updated a project <b>KYC - Client Onboarding 2017</b>.','10.240.1.67',1506848060,'projects',0),(50,1,2,'deleted a project <b>UBS Switzerland</b>.','10.240.1.67',1506848065,'projects',0),(51,1,4,'created a new project <b>KYC - Client Onboarding 2018</b>.','10.240.0.189',1506848093,'projects',0),(52,1,3,'modified a taskDeutsche Bankfor project KYC - Client Onboarding 2017','10.240.1.67',1506848148,'tasks/view_task/6',6),(53,1,3,'created a new task: UBS Switzerlandfor project KYC - Client Onboarding 2017','10.240.1.18',1506848178,'tasks/view_task/7',7),(54,1,3,'created a new task: Commerzbank AGfor project KYC - Client Onboarding 2017','10.240.1.14',1506848222,'tasks/view_task/8',8),(55,1,3,'modified a taskDeutsche Bankfor project KYC - Client Onboarding 2017','10.240.0.189',1506848461,'tasks/view_task/6',6),(56,1,3,'added a new user <b>Test_Analyst_Frankfurt</b> to a project.','10.240.1.18',1506848541,'team',0),(57,1,3,'updated a Team Member <b>Test_Analyst_Frankfurt</b> for a project.','10.240.1.31',1506848717,'team',0),(58,1,3,'added a new user <b>Test_Analyst_Frankfurt</b> to a task: <a href=\'https://project-compex-cwerdich.c9users.io/crm/index.php/tasks/view/6\'>Deutsche Bank</a>','10.240.1.45',1506848729,'tasks/view/6',6),(59,5,3,'marked an new objective <b>Test Frage 2</b>as complete!','10.240.1.45',1506848899,'tasks/view/6',6),(60,5,3,'marked an new objective <b>Test Frage 3</b>as complete!','10.240.1.18',1506848902,'tasks/view/6',6),(61,5,3,'modified an objective: <b>Test Frage 3</b>','10.240.0.189',1506848915,'tasks/view/6',6),(62,5,3,'posted a new message to task: Deutsche Bank','10.240.1.67',1506848951,'tasks/view_task/6',6),(63,5,3,'deleted a message to task: Deutsche Bank','10.240.1.14',1506848958,'tasks/view_task/6',6),(64,5,3,'modified an objective: <b>Test frage</b>','10.240.1.45',1506851933,'tasks/view/6',6),(65,5,3,'modified an objective: <b>Test frage</b>','10.240.0.224',1506851951,'tasks/view/6',6),(66,5,3,'modified an objective: <b>Test Frage 2</b>','10.240.1.14',1506851981,'tasks/view/6',6),(67,1,0,'added a new Team Role <b>Analyst</b>.','10.240.1.67',1506852777,'team/roles',0),(68,1,3,'modified an objective: <b>Test frage</b>','10.240.1.31',1506866639,'tasks/view/6',6),(69,1,3,'modified an objective: <b>Test Frage 3</b>','10.240.1.31',1507383237,'tasks/view/6',6),(70,6,5,'created a new project <b>Test Jahr 2017</b>.','10.240.1.67',1508007319,'projects',0),(71,6,5,'created a new task: Bank 1for project Test Jahr 2017','10.240.0.189',1508007346,'tasks/view_task/9',9),(72,6,5,'updated a project <b>2017</b>.','10.240.1.4',1508007374,'projects',0),(73,6,5,'added a new objective <b>TestObjective</b> to a task: <a href=\'https://project-compex-cleme-cwerdich.c9users.io/crm/index.php/tasks/view/9\'>Bank 1</a>','10.240.0.224',1508009659,'tasks/view/9',9),(74,6,5,'marked an new objective <b>TestObjective</b>as complete!','10.240.1.4',1508059551,'tasks/view/9',9),(75,6,5,'modified an objective: <b>TestObjective</b>','10.240.1.31',1508059570,'tasks/view/9',9),(76,6,5,'created a new task: Test Hashfor project 2017','10.240.1.4',1508061399,'tasks/view_task/10',10),(77,6,5,'modified a taskBank 1for project 2017','10.240.1.4',1508062248,'tasks/view_task/9',9),(78,6,5,'modified a taskTest Hashfor project 2017','10.240.1.67',1508062260,'tasks/view_task/10',10),(79,6,5,'modified a taskBank 1for project 2017','10.240.1.31',1508062268,'tasks/view_task/9',9),(80,6,5,'modified a taskTest Hashfor project 2017','10.240.0.224',1508062293,'tasks/view_task/10',10),(81,6,5,'modified a taskTest Hashfor project 2017','10.240.0.224',1508062305,'tasks/view_task/10',10),(82,6,5,'modified a taskBank 2for project 2017','10.240.1.67',1508062328,'tasks/view_task/10',10),(83,6,5,'started a new timer with the note <b></b>.','10.240.1.67',1508062345,'time',10),(84,6,5,'started a new timer with the note <b></b>.','10.240.0.224',1508062363,'time',10),(85,6,5,'modified a taskBank 2for project 2017','10.240.1.67',1508062556,'tasks/view_task/10',10),(86,6,5,'created a new task: Test 4for project 2017','10.240.1.14',1508065257,'tasks/view_task/11',11),(87,6,5,'deleted a task: Test 4','10.240.1.4',1508065294,'tasks',11),(88,6,3,'created a new task: test 5for project KYC - Client Onboarding 2017','10.240.1.31',1508065421,'tasks/view_task/12',12),(89,6,5,'created a new task: Task 5for project 2017','10.240.0.189',1508065455,'tasks/view_task/13',13),(90,6,5,'created a new task: Test 6for project 2017','10.240.0.224',1508065560,'tasks/view_task/14',14),(91,6,5,'created a new task: Test 7for project 2017','10.240.1.18',1508065581,'tasks/view_task/15',15),(92,6,5,'deleted a task: Test 7','10.240.1.14',1508065597,'tasks',15),(93,6,5,'deleted a task: Test 6','10.240.1.45',1508065608,'tasks',14),(94,6,5,'deleted a task: Task 5','10.240.1.67',1508065617,'tasks',13),(95,1,3,'created a new task: UBS Switzerland Germanyfor project KYC - Client Onboarding 2017','10.240.1.14',1508068371,'tasks/view_task/16',16),(96,1,3,'modified a taskUBS Switzerland Germanyfor project KYC - Client Onboarding 2017','10.240.1.14',1508068487,'tasks/view_task/16',16),(97,1,3,'modified a taskUBS Switzerland Germanyfor project KYC - Client Onboarding 2017','10.240.1.67',1508137497,'tasks/view_task/16',16),(98,6,5,'modified an objective: <b>Objective TEst</b>','10.240.1.45',1509896567,'tasks/view/9',9),(99,6,5,'modified a taskBank 2for project 2017','10.240.1.45',1509901988,'tasks/view_task/10',10),(100,6,5,'modified a taskBank 1for project 2017','10.240.1.18',1509903081,'tasks/view/9',9),(101,6,5,'modified a taskBank 1for project 2017','10.240.0.189',1509903084,'tasks/view/9',9),(102,6,5,'modified a taskBank 1for project 2017','10.240.1.4',1509903086,'tasks/view/9',9),(103,6,5,'started a new timer with the note <b></b>.','10.240.1.4',1509904884,'time',10),(104,6,5,'modified a taskBank 1for project 2017','10.240.1.184',1509906187,'tasks/view/9',9),(105,6,5,'modified a taskBank 1for project 2017','10.240.1.4',1509906192,'tasks/view/9',9),(106,6,5,'modified a taskBank 1for project 2017','10.240.0.189',1509906194,'tasks/view/9',9),(107,6,5,'modified a taskBank 1for project 2017','10.240.1.18',1509906839,'tasks/view/9',9),(108,6,5,'modified a taskBank 1for project 2017','10.240.1.67',1509906855,'tasks/view/9',9),(109,6,5,'modified a taskBank 1for project 2017','10.240.1.184',1509906869,'tasks/view/9',9),(110,6,5,'modified a taskBank 1for project 2017','10.240.1.18',1509906874,'tasks/view/9',9),(111,6,5,'created a new task: Bank 3for project 2017','10.240.1.4',1509907011,'tasks/view_task/17',17),(112,6,5,'modified a taskBank 3for project 2017','10.240.1.4',1509907764,'tasks/view/17',17),(113,6,5,'modified a taskBank 3for project 2017','10.240.1.45',1509908422,'tasks/view/17',17),(114,6,5,'modified a taskBank 2for project 2017','10.240.0.189',1509908431,'tasks/view/10',10),(115,6,5,'modified a taskBank 1for project 2017','10.240.1.184',1509908481,'tasks/view/9',9),(116,6,5,'modified a taskBank 1for project 2017','10.240.1.45',1509908529,'tasks/view/9',9),(117,6,5,'modified a taskBank 1for project 2017','10.240.1.45',1509908533,'tasks/view/9',9),(118,6,5,'modified a taskBank 1for project 2017','10.240.1.45',1509908567,'tasks/view/9',9),(119,6,5,'modified a taskBank 1for project 2017','10.240.1.18',1509908607,'tasks/view/9',9),(120,6,5,'modified a taskBank 1for project 2017','10.240.1.45',1509908615,'tasks/view/9',9),(121,6,5,'modified a taskBank 1for project 2017','10.240.1.184',1509908619,'tasks/view/9',9),(122,6,5,'modified a taskBank 2for project 2017','10.240.1.4',1509908742,'tasks/view/10',10),(123,6,5,'modified a taskBank 3for project 2017','10.240.1.45',1509909560,'tasks/view/17',17),(124,6,5,'modified a taskBank 3for project 2017','10.240.1.31',1509909666,'tasks/view/17',17),(125,6,5,'modified a taskBank 3for project 2017','10.240.0.189',1509909668,'tasks/view/17',17),(126,6,5,'modified a taskBank 3for project 2017','10.240.1.184',1509909674,'tasks/view/17',17),(127,6,5,'modified a taskBank 3for project 2017','10.240.1.67',1509909678,'tasks/view/17',17),(128,6,5,'modified a taskBank 3for project 2017','10.240.1.45',1509909780,'tasks/view/17',17),(129,6,5,'modified a taskBank 3for project 2017','10.240.1.18',1509909888,'tasks/view/17',17),(130,6,5,'modified a taskBank 2for project 2017','10.240.1.18',1509909909,'tasks/view/10',10),(131,6,5,'modified a taskBank 2for project 2017','10.240.0.161',1509909991,'tasks/view/10',10),(132,6,5,'modified a taskBank 2for project 2017','10.240.1.14',1509909997,'tasks/view/10',10),(133,6,5,'modified a taskBank 2for project 2017','10.240.1.18',1509910000,'tasks/view/10',10),(134,6,5,'modified a taskBank 2for project 2017','10.240.0.161',1509910040,'tasks/view/10',10),(135,1,4,'created a new task: TEST Bank 10for project KYC - Client Onboarding 2018','10.240.0.161',1509994128,'tasks/view_task/18',18),(136,1,4,'modified a taskTEST Bank 10for project KYC - Client Onboarding 2018','10.240.1.4',1509994182,'tasks/view/18',18),(137,1,4,'modified a taskTEST Bank 10for project KYC - Client Onboarding 2018','10.240.1.18',1509994313,'tasks/view/18',18),(138,1,4,'modified a taskTEST Bank 10for project KYC - Client Onboarding 2018','10.240.1.31',1509994314,'tasks/view/18',18),(139,1,4,'modified a taskTEST Bank 10for project KYC - Client Onboarding 2018','10.240.0.161',1509994316,'tasks/view/18',18),(140,1,4,'modified a taskTEST Bank 10for project KYC - Client Onboarding 2018','10.240.1.31',1509994316,'tasks/view/18',18),(141,1,4,'modified a taskTEST Bank 10for project KYC - Client Onboarding 2018','10.240.1.31',1509994317,'tasks/view/18',18),(142,1,4,'modified a taskTEST Bank 10for project KYC - Client Onboarding 2018','10.240.1.67',1509994317,'tasks/view/18',18),(143,1,4,'modified a taskTEST Bank 10for project KYC - Client Onboarding 2018','10.240.1.31',1509994317,'tasks/view/18',18),(144,1,4,'modified a taskTEST Bank 10for project KYC - Client Onboarding 2018','10.240.1.4',1509994318,'tasks/view/18',18),(145,1,4,'created a new task: Bank test 11for project KYC - Client Onboarding 2018','10.240.1.18',1509994404,'tasks/view_task/19',19),(146,1,4,'modified a taskBank test 11for project KYC - Client Onboarding 2018','10.240.0.161',1509994462,'tasks/view/19',19),(147,1,4,'modified a taskBank test 11for project KYC - Client Onboarding 2018','10.240.1.14',1509994464,'tasks/view/19',19),(148,1,4,'modified a taskBank test 11for project KYC - Client Onboarding 2018','10.240.1.45',1509994464,'tasks/view/19',19),(149,1,4,'modified a taskBank test 11for project KYC - Client Onboarding 2018','10.240.1.4',1509994464,'tasks/view/19',19),(150,1,4,'modified a taskBank test 11for project KYC - Client Onboarding 2018','10.240.0.161',1509994464,'tasks/view/19',19),(151,1,4,'modified a taskBank test 11for project KYC - Client Onboarding 2018','10.240.1.67',1509994466,'tasks/view/19',19),(152,1,3,'created a new task: Test Camillofor project KYC - Client Onboarding 2017','10.240.0.189',1509996643,'tasks/view_task/20',20),(153,1,4,'created a new task: Camillo test v_2for project KYC - Client Onboarding 2018','10.240.1.18',1509996901,'tasks/view_task/21',21),(154,1,4,'modified a taskCamillo test v_2for project KYC - Client Onboarding 2018','10.240.1.184',1509996950,'tasks/view/21',21),(155,1,6,'created a new project <b>KYC - Client Review 2017</b>.','10.240.1.18',1509997273,'projects',0),(156,1,4,'deleted a project <b>KYC - Client Onboarding 2018</b>.','10.240.1.14',1509997279,'projects',0),(157,1,6,'created a new task: UBS Switzerlandfor project KYC - Client Review 2017','10.240.1.18',1509997391,'tasks/view_task/22',22),(158,1,6,'modified a taskUBS Switzerlandfor project KYC - Client Review 2017','10.240.0.189',1509997453,'tasks/view/22',22),(159,1,6,'updated a project <b>KYC - Client Review 2017</b>.','10.240.1.18',1509997701,'projects',0),(160,1,5,'deleted a project <b>2017</b>.','10.240.1.45',1510092376,'projects',0),(161,1,3,'deleted a project <b>KYC - Client Onboarding 2017</b>.','10.240.1.18',1510092382,'projects',0),(162,1,6,'created a new task: Marianas Bankfor project KYC - Client Review 2017','10.240.1.4',1510093188,'tasks/view_task/23',23),(163,1,6,'modified a taskMarianas Bankfor project KYC - Client Review 2017','10.240.1.4',1510093258,'tasks/view/23',23),(164,1,6,'modified a taskMarianas Bankfor project KYC - Client Review 2017','10.240.1.14',1510093341,'tasks/view/23',23),(165,1,6,'modified a taskMarianas Bankfor project KYC - Client Review 2017','10.240.1.14',1510093391,'tasks/view/23',23),(166,1,6,'modified a taskMarianas Bankfor project KYC - Client Review 2017','10.240.1.18',1510093504,'tasks/view/23',23),(167,1,6,'modified a taskUBS Switzerlandfor project KYC - Client Review 2017','10.240.1.18',1510094092,'tasks/view_task/22',22),(168,1,6,'created a new task: test  3for project KYC - Client Review 2017','10.240.0.189',1510094198,'tasks/view_task/24',24),(169,1,6,'modified a tasktest  3for project KYC - Client Review 2017','10.240.1.4',1510094229,'tasks/view/24',24),(170,1,6,'updated a project <b>KYC - Client Review 2017</b>.','10.240.1.18',1510094295,'projects',0),(171,1,6,'deleted a project <b>KYC - Client Review 2017</b>.','10.240.0.189',1510136144,'projects',0),(172,1,7,'created a new project <b>KYC - Client Review 2017</b>.','10.240.0.189',1510136236,'projects',0),(173,1,7,'created a new task: Rabobank Netherlandsfor project KYC - Client Review 2017','10.240.0.189',1510136267,'tasks/view_task/25',25),(174,1,7,'modified a taskRabobank Netherlandsfor project KYC - Client Review 2017','10.240.1.4',1510136301,'tasks/view/25',25),(175,1,7,'created a new task: UBS Switzerlandfor project KYC - Client Review 2017','10.240.1.67',1510136356,'tasks/view_task/26',26),(176,1,7,'modified a taskUBS Switzerlandfor project KYC - Client Review 2017','10.240.1.184',1510136380,'tasks/view/26',26),(177,1,7,'created a new task: Commerzbank AGfor project KYC - Client Review 2017','10.240.1.16',1510176614,'tasks/view_task/27',27),(178,1,7,'updated a project <b>KYC - Client Review 2017</b>.','10.240.1.16',1510176636,'projects',0),(179,1,7,'added a new user <b>janspoerer</b> to a project.','10.240.1.184',1510176673,'team',0),(180,1,7,'added a new user <b>janspoerer</b> to a task: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/tasks/view/27\'>Commerzbank AG</a>','10.240.1.16',1510176689,'tasks/view/27',27),(181,1,7,'added a removed a user <b>Camillo_admin</b> from a task <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/tasks/view/27\'>Commerzbank AG</a>','10.240.0.161',1510176701,'tasks/view/27',27),(182,1,7,'created a new task: Schwyzer Kantonalbankfor Report Cycle KYC - Client Review 2017','10.240.1.184',1510259369,'tasks/view_task/28',28),(183,1,7,'posted a new message to Bank: Schwyzer Kantonalbank','10.240.1.15',1510259683,'tasks/view_task/28',28),(184,1,7,'modified a BankSchwyzer Kantonalbankfor Report Cycle KYC - Client Review 2017','10.240.1.18',1510261389,'tasks/view/28',28),(185,1,7,'started a new timer with the note <b>Review time</b>.','10.240.1.67',1510305114,'time',0),(186,1,0,'started a new timer with the note <b>Friday Timer</b>.','10.240.0.161',1510305146,'time',0),(187,1,7,'stopped a timer with the note <b>Review time</b>.','10.240.1.16',1510305153,'time',0),(188,1,0,'stopped a timer with the note <b>Friday Timer</b>.','10.240.1.15',1510305155,'time',0),(189,1,0,'started a new timer with the note <b>Friday Timer</b>.','10.240.1.16',1510305157,'time',0),(190,1,7,'posted a new message to Bank: Schwyzer Kantonalbank','10.240.1.184',1510305209,'tasks/view_task/28',28),(191,1,7,'started a new timer with the note <b></b>.','10.240.0.227',1510305219,'time',28),(192,1,7,'modified a timer with the note <b>Review time</b>.','10.240.1.18',1510305349,'time',0),(193,1,7,'stopped a timer with the note <b></b>.','10.240.0.227',1510338786,'time',0),(194,1,8,'created a new Report Cycle <b>test</b>.','10.240.1.184',1510339541,'projects',0),(195,1,8,'added a new user <b>janspoerer</b> to a Report Cycle.','10.240.0.5',1510339648,'team',0),(196,1,7,'added a new user <b>Test_Analyst_Frankfurt</b> to a Report Cycle.','10.240.1.18',1510339661,'team',0),(197,1,8,'created a new Bank: test bank 1for Report Cycle test','10.240.1.18',1510339852,'tasks/view_task/29',29),(198,1,8,'added a new user <b>Test_Analyst</b> to a Report Cycle.','10.240.1.15',1510339875,'team',0),(199,1,8,'added a new user <b>Test_Analyst</b> to a Bank: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/tasks/view/29\'>test bank 1</a>','10.240.1.67',1510339904,'tasks/view/29',29),(200,1,8,'deleted a Report Cycle <b>test</b>.','10.240.0.161',1510339988,'projects',0),(201,1,7,'modified a BankUBS Switzerlandfor Report Cycle KYC - Client Review 2017','10.240.1.4',1510340165,'tasks/view/26',26),(202,1,7,'modified a BankUBS Switzerlandfor Report Cycle KYC - Client Review 2017','10.240.0.227',1510340168,'tasks/view/26',26),(203,1,7,'modified a BankUBS Switzerlandfor Report Cycle KYC - Client Review 2017','10.240.1.184',1510340172,'tasks/view/26',26),(204,1,7,'modified a BankUBS Switzerlandfor Report Cycle KYC - Client Review 2017','10.240.1.4',1510340173,'tasks/view/26',26),(205,1,7,'modified a BankUBS Switzerlandfor Report Cycle KYC - Client Review 2017','10.240.0.5',1510340173,'tasks/view/26',26),(206,1,7,'modified a BankUBS Switzerlandfor Report Cycle KYC - Client Review 2017','10.240.0.227',1510340192,'tasks/view/26',26),(207,1,7,'posted a new message to Bank: UBS Switzerland','10.240.0.227',1510340234,'tasks/view_task/26',26),(208,1,7,'started a new timer with the note <b></b>.','10.240.1.18',1510340460,'time',26),(209,1,7,'stopped a timer with the note <b></b>.','10.240.1.16',1510340468,'time',0),(210,1,0,'stopped a timer with the note <b>Friday Timer</b>.','10.240.0.161',1510340473,'time',0),(211,1,0,'stopped a timer with the note <b>Friday Timer</b>.','10.240.1.184',1510340475,'time',0),(212,1,7,'modified a timer with the note <b></b>.','10.240.1.67',1510340503,'time',0),(213,1,7,'modified a BankUBS Switzerlandfor Report Cycle KYC - Client Review 2017','10.240.1.15',1510341963,'tasks/view/26',26),(214,1,7,'modified a BankUBS Switzerlandfor Report Cycle KYC - Client Review 2017','10.240.1.67',1510341963,'tasks/view/26',26),(215,1,7,'modified a BankUBS Switzerlandfor Report Cycle KYC - Client Review 2017','10.240.1.67',1510341963,'tasks/view/26',26),(216,1,7,'modified a BankUBS Switzerlandfor Report Cycle KYC - Client Review 2017','10.240.1.16',1510341976,'tasks/view_task/26',26),(217,3,7,'modified a BankSchwyzer Kantonalbankfor Report Cycle KYC - Client Review 2017','10.240.0.5',1510346328,'tasks/view/28',28),(218,1,7,'added a new user <b>AnalystCompex</b> to a Report Cycle.','10.240.1.184',1510346500,'team',0),(219,1,7,'added a new user <b>AnalystCompex</b> to a Bank: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/tasks/view/27\'>Commerzbank AG</a>','10.240.0.5',1510346532,'tasks/view/27',27),(220,1,7,'added a new user <b>AnalystCompex</b> to a Bank: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/tasks/view/25\'>Rabobank Netherlands</a>','10.240.1.184',1510346561,'tasks/view/25',25),(221,1,7,'created a new Bank: Credit Swissfor Report Cycle KYC - Client Review 2017','10.240.1.18',1510346628,'tasks/view_task/30',30),(222,3,7,'created a new Bank: Test für Template &quot;KYC CB 2017&quot;for Report Cycle KYC - Client Review 2017','10.240.1.184',1510346771,'tasks/view_task/31',31),(223,7,7,'modified a BankUBS Switzerlandfor Report Cycle KYC - Client Review 2017','10.240.1.16',1510346780,'tasks/view/26',26),(224,7,7,'modified a BankUBS Switzerlandfor Report Cycle KYC - Client Review 2017','10.240.0.227',1510346781,'tasks/view/26',26),(225,7,7,'uploaded a new file to the File Manager view: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/files/view_file/2\'>Click here</a>','10.240.1.184',1510346936,'files',0),(226,7,7,'attached a new file <b>Annal report</b> to a Bank: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/tasks/view/30\'>Credit Swiss</a>','10.240.1.18',1510346963,'tasks/view/30',30),(227,7,7,'updated a folder on the File Manager view: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/files/view_file/1\'>Click here</a>','10.240.1.15',1510347052,'files',0),(228,7,7,'updated a file on the File Manager view: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/files/view_file/2\'>Your Passwords do not match!</a>','10.240.0.5',1510347061,'files',0),(229,1,7,'added a new Finance entry titled: Test','10.240.1.15',1510347692,'finance',0),(230,1,0,'added a new Finance Category: KYC','10.240.1.67',1510347862,'finance/categories',0),(231,1,0,'modified a Finance Category: KYC','10.240.0.5',1510347868,'finance/categories',0),(232,1,7,'added a new Finance entry titled: tet','10.240.1.184',1510348632,'finance',0),(233,1,7,'added a removed a user <b>Camillo_admin</b> from a Bank <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/tasks/view/30\'>Credit Swiss</a>','10.240.1.15',1510488352,'tasks/view/30',30),(234,1,7,'modified a BankUBS Switzerlandfor Report Cycle KYC - Client Review 2017','10.240.1.15',1510488395,'tasks/view_task/26',26),(235,1,0,'updated an invoice.','10.240.0.5',1510488676,'invoices/view/1/744c2db13fcd8daeacaa0112217336214df3c31e',0),(236,1,7,'modified a BankUBS Switzerlandfor Report Cycle KYC - Client Review 2017','10.240.0.90',1518433250,'tasks/view/26',26),(237,1,7,'created a new Bank: Hypo Real Estatefor Report Cycle KYC - Client Review 2017','10.240.0.227',1518433666,'tasks/view_task/32',32),(238,1,8,'created a new Report Cycle <b>KYC - Client Onboarding 2018o</b>.','10.240.0.227',1518433721,'projects',0),(239,1,8,'deleted a Report Cycle <b>KYC - Client Onboarding 2018o</b>.','10.240.0.185',1518433732,'projects',0),(240,1,9,'created a new Report Cycle <b>KYC 2018</b>.','10.240.1.189',1518433744,'projects',0),(241,1,9,'created a new Bank: Commerzbank AGfor Report Cycle KYC 2018','10.240.0.185',1518433806,'tasks/view_task/33',33),(242,1,9,'added a new user <b>janspoerer</b> to a Report Cycle.','10.240.1.189',1518433830,'team',0),(243,1,9,'added a new user <b>janspoerer</b> to a Bank: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/tasks/view/33\'>Commerzbank AG</a>','10.240.0.88',1518433867,'tasks/view/33',33),(244,1,0,'started a new timer with the note <b>Monday Timer</b>.','10.240.0.222',1518433944,'time',0),(245,1,0,'stopped a timer with the note <b>Monday Timer</b>.','10.240.0.88',1518434010,'time',0),(246,1,9,'modified a timer with the note <b></b>.','10.240.1.99',1518434042,'time',0),(247,1,9,'started a new timer with the note <b></b>.','10.240.1.0',1518434071,'time',33),(248,1,9,'stopped a timer with the note <b></b>.','10.240.0.222',1518434086,'time',0),(249,1,9,'modified a timer with the note <b>Review time</b>.','10.240.1.220',1518434107,'time',0),(250,1,9,'started a new timer with the note <b></b>.','10.240.0.87',1518434135,'time',33),(251,1,9,'stopped a timer with the note <b></b>.','10.240.0.227',1518434145,'time',0),(252,1,9,'modified a timer with the note <b>QC</b>.','10.240.0.227',1518434161,'time',0),(253,1,9,'modified a BankCommerzbank AGfor Report Cycle KYC 2018','10.240.1.0',1518434416,'tasks/view/33',33),(254,3,7,'modified a BankCredit Suissefor Report Cycle KYC - Client Review 2017','10.240.1.220',1518519724,'tasks/view_task/30',30),(255,3,7,'deleted a Bank: Test für Template &quot;KYC CB 2017&quot;','10.240.1.99',1518519740,'tasks',31),(256,3,7,'updated a Report Cycle <b>KYC 2017</b>.','10.240.0.222',1518519792,'projects',0),(257,3,7,'uploaded a new file to the File Manager view: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/files/view_file/3\'>Click here</a>','10.240.0.87',1518526663,'files',0),(258,3,9,'uploaded a new file to the File Manager view: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/files/view_file/4\'>Click here</a>','10.240.0.90',1518527126,'files',0),(259,3,9,'uploaded a new file to the File Manager view: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/files/view_file/5\'>Click here</a>','10.240.1.97',1518527144,'files',0),(260,3,9,'uploaded a new file to the File Manager view: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/files/view_file/6\'>Click here</a>','10.240.0.185',1518527216,'files',0),(261,3,9,'uploaded a new file to the File Manager view: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/files/view_file/7\'>Click here</a>','10.240.0.90',1518527274,'files',0),(262,3,9,'uploaded a new file to the File Manager view: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/files/view_file/8\'>Click here</a>','10.240.1.99',1518527311,'files',0),(263,3,9,'uploaded a new file to the File Manager view: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/files/view_file/9\'>Click here</a>','10.240.0.227',1518527449,'files',0),(264,3,9,'updated a file on the File Manager view: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/files/view_file/9\'>Your Passwords do not match!</a>','10.240.0.185',1518527463,'files',0),(265,3,9,'uploaded a new file to the File Manager view: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/files/view_file/10\'>Click here</a>','10.240.1.189',1518527537,'files',0),(266,3,9,'uploaded a new file to the File Manager view: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/files/view_file/11\'>Click here</a>','10.240.1.189',1518527565,'files',0),(267,3,7,'removed a file <b></b> from a Bank <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/tasks/view/30\'>Credit Suisse</a>','10.240.1.220',1518527608,'tasks/view/30',30),(268,3,7,'deleted a file from the File Manager (Annal report)','10.240.0.222',1518527624,'files',0),(269,3,7,'attached a new file <b>Annual Report Credit Suisse 2016</b> to a Bank: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/tasks/view/30\'>Credit Suisse</a>','10.240.0.222',1518527895,'tasks/view/30',30),(270,3,9,'created a new Bank: DZ Bankfor Report Cycle KYC 2018','10.240.0.88',1518530609,'tasks/view_task/34',34),(271,3,7,'modified a BankSchwyzer Kantonalbankfor Report Cycle KYC 2017','10.240.1.0',1518531669,'tasks/view_task/28',28),(272,3,7,'modified a BankHypo Real Estatefor Report Cycle KYC 2017','10.240.0.90',1518533224,'tasks/view/32',32),(273,3,7,'modified a BankHypo Real Estatefor Report Cycle KYC 2017','10.240.0.90',1518533236,'tasks/view/32',32),(274,3,9,'modified a BankCommerzbank AGfor Report Cycle KYC 2018','10.240.1.99',1518533246,'tasks/view/33',33),(275,3,9,'modified a BankDZ Bankfor Report Cycle KYC 2018','10.240.0.87',1518533254,'tasks/view/34',34),(276,3,7,'modified a BankCredit Suissefor Report Cycle KYC 2017','10.240.0.88',1518533263,'tasks/view/30',30),(277,3,7,'modified a BankCommerzbank AGfor Report Cycle KYC 2017','10.240.1.189',1518533273,'tasks/view/27',27),(278,3,9,'added a new user <b>AnalystCompex</b> to a Report Cycle.','10.240.0.185',1518544996,'team',0),(279,1,7,'modified a BankUBS Switzerlandfor Report Cycle KYC 2017','10.240.0.185',1518633232,'tasks/view/26',26),(280,1,9,'created a new Bank: Credit Swissfor Report Cycle KYC 2018','10.240.1.97',1518633365,'tasks/view_task/35',35),(281,1,9,'attached a new file <b>Credit Suisse 2017 Q3 Report</b> to a Bank: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/tasks/view/35\'>Credit Swiss</a>','10.240.0.88',1518633432,'tasks/view/35',35),(282,1,9,'attached a new file <b>Credit Suisse 2017 Q1 Report</b> to a Bank: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/tasks/view/35\'>Credit Swiss</a>','10.240.0.90',1518633441,'tasks/view/35',35),(283,1,9,'attached a new file <b>Credit Suisse 2017 Q2 Report</b> to a Bank: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/tasks/view/35\'>Credit Swiss</a>','10.240.1.189',1518633450,'tasks/view/35',35),(284,1,9,'attached a new file <b>UBS 2017 Q4 Report</b> to a Bank: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/tasks/view/33\'>Commerzbank AG</a>','10.240.0.185',1518633478,'tasks/view/33',33),(285,1,9,'removed a file <b></b> from a Bank <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/tasks/view/33\'>Commerzbank AG</a>','10.240.1.189',1518633484,'tasks/view/33',33),(286,1,9,'modified a BankCredit Swissfor Report Cycle KYC 2018','10.240.1.220',1518645733,'tasks/view_task/35',35),(287,1,9,'modified a BankDZ Bankfor Report Cycle KYC 2018','10.240.0.87',1518645748,'tasks/view_task/34',34),(288,1,9,'modified a BankCredit Swissfor Report Cycle KYC 2018','10.240.1.99',1518645782,'tasks/view_task/35',35),(289,3,9,'modified a BankCredit Suissefor Report Cycle KYC 2018','10.240.0.187',1518650831,'tasks/view_task/35',35),(290,1,9,'modified a BankCommerzbank AGfor Report Cycle KYC 2018','10.240.1.0',1518689515,'tasks/view/33',33),(291,1,9,'modified a BankCredit Suissefor Report Cycle KYC 2018','10.240.0.187',1518689914,'tasks/view/35',35),(292,1,9,'added a new user <b>Malte_Schwarzer</b> to a Report Cycle.','10.240.0.88',1518690583,'team',0),(293,3,7,'added a new user <b>Malte_Schwarzer</b> to a Report Cycle.','10.240.1.99',1518690589,'team',0),(294,1,9,'modified a BankDZ Bankfor Report Cycle KYC 2018','10.240.0.222',1518692851,'tasks/view/34',34),(295,8,10,'created a new Report Cycle <b>Foo</b>.','10.240.1.220',1518696044,'projects',0),(296,8,10,'created a new Bank: Barfor Report Cycle Foo','10.240.0.227',1518696076,'tasks/view_task/36',36),(297,1,0,'started a new timer with the note <b>Thursday Timer</b>.','10.240.0.88',1518699849,'time',0),(298,1,0,'stopped a timer with the note <b>Thursday Timer</b>.','10.240.0.222',1518699854,'time',0),(299,1,0,'modified a timer with the note <b>Thursday Timer</b>.','10.240.0.185',1518699863,'time',0),(300,1,9,'modified a timer with the note <b>QC</b>.','10.240.1.97',1518699874,'time',0),(301,1,9,'created a new Bank: Rabobank Netherlandsfor Report Cycle KYC 2018','10.240.1.220',1518699972,'tasks/view_task/37',37),(302,1,9,'modified a BankDZ Bankfor Report Cycle KYC 2018','10.240.0.185',1518713037,'tasks/view/34',34),(303,1,9,'uploaded a new file to the File Manager view: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/files/view_file/12\'>Click here</a>','10.240.0.239',1519943223,'files',0),(304,1,9,'attached a new file <b>2016 - Sparkasse</b> to a Bank: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/tasks/view/35\'>Credit Suisse</a>','10.240.1.220',1519944401,'tasks/view/35',35);
/*!40000 ALTER TABLE `user_action_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_blocks`
--

DROP TABLE IF EXISTS `user_blocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_blocks` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `blockid` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `reason` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_blocks`
--

LOCK TABLES `user_blocks` WRITE;
/*!40000 ALTER TABLE `user_blocks` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_blocks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_custom_fields`
--

DROP TABLE IF EXISTS `user_custom_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_custom_fields` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `fieldid` int(11) NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_custom_fields`
--

LOCK TABLES `user_custom_fields` WRITE;
/*!40000 ALTER TABLE `user_custom_fields` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_custom_fields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_data`
--

DROP TABLE IF EXISTS `user_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_data` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `twitter` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `google` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_data`
--

LOCK TABLES `user_data` WRITE;
/*!40000 ALTER TABLE `user_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_events`
--

DROP TABLE IF EXISTS `user_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_events` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IP` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `event` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_events`
--

LOCK TABLES `user_events` WRITE;
/*!40000 ALTER TABLE `user_events` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_group_users`
--

DROP TABLE IF EXISTS `user_group_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_group_users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `groupid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_group_users`
--

LOCK TABLES `user_group_users` WRITE;
/*!40000 ALTER TABLE `user_group_users` DISABLE KEYS */;
INSERT INTO `user_group_users` VALUES (1,1,1),(2,1,3),(3,1,5);
/*!40000 ALTER TABLE `user_group_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_groups`
--

DROP TABLE IF EXISTS `user_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_groups` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `default` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_groups`
--

LOCK TABLES `user_groups` WRITE;
/*!40000 ALTER TABLE `user_groups` DISABLE KEYS */;
INSERT INTO `user_groups` VALUES (1,'Default Group',1),(2,'Analyst',0);
/*!40000 ALTER TABLE `user_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_lead_custom_fields`
--

DROP TABLE IF EXISTS `user_lead_custom_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_lead_custom_fields` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `leadid` int(11) NOT NULL,
  `fieldid` int(11) NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_lead_custom_fields`
--

LOCK TABLES `user_lead_custom_fields` WRITE;
/*!40000 ALTER TABLE `user_lead_custom_fields` DISABLE KEYS */;
INSERT INTO `user_lead_custom_fields` VALUES (1,1,1,'Yes'),(2,2,1,'No'),(5,4,1,'Yes'),(6,5,1,'Yes'),(7,6,1,'Yes'),(8,7,1,'Yes'),(9,8,1,'Yes'),(10,9,1,'Yes'),(11,10,1,'Yes'),(12,11,1,'Yes'),(15,12,1,''),(17,14,1,''),(18,15,1,'No'),(19,3,1,''),(20,16,1,'Yes'),(21,17,1,'Yes');
/*!40000 ALTER TABLE `user_lead_custom_fields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_lead_fields`
--

DROP TABLE IF EXISTS `user_lead_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_lead_fields` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `leadid` int(11) NOT NULL,
  `fieldid` int(11) NOT NULL,
  `answer` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `project_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_lead_fields`
--

LOCK TABLES `user_lead_fields` WRITE;
/*!40000 ALTER TABLE `user_lead_fields` DISABLE KEYS */;
INSERT INTO `user_lead_fields` VALUES (1,1,1,'<p>UBS</p>\r\n',0,0),(2,1,2,'UBSW23',0,0),(3,1,3,'Yes',0,0),(4,1,4,'60',0,0),(5,2,1,'<p>Commerzbank AG</p>\r\n',0,0),(6,2,2,'GSA231',0,0),(7,2,3,'No',0,0),(8,2,4,'90',0,0),(9,2,5,'B',0,0),(23,13,6,'A1',0,0),(24,13,7,'A2',0,0),(27,12,6,'Antwort Frage 1',0,0),(28,12,7,'Antwort Frage 2',0,0),(34,14,1,'<p>test 1234</p>\r\n',0,0),(35,14,2,'BAD1929',0,0),(36,14,3,'Yes',0,0),(37,14,4,'10',0,0),(38,14,5,'A',0,0),(39,3,1,'<p>test 2</p>\r\n',0,0),(40,3,2,'sd',0,0),(41,3,3,'Yes',0,0),(42,3,4,'10',0,0),(43,3,5,'B',0,0),(44,16,8,'',0,0),(45,16,9,' USA',0,0),(46,16,10,'Anton',0,0),(47,17,8,'',0,0),(48,17,9,' USA',0,0),(49,17,10,'Anton',0,0),(56,18,8,'Test bank 12',0,0),(57,18,9,' USA',0,0),(58,18,10,'Anton',0,0),(59,19,8,'<p>atet</p>\r\n',0,0),(60,19,9,' USA',0,0),(61,19,10,' Berta',0,0),(62,20,8,'',0,0),(63,20,9,' USA',0,0),(64,20,10,' Berta',0,0),(65,21,11,'<p>Rabo</p>\r\n',0,0),(66,21,12,'A',0,0),(67,21,13,'<p>Netherlands</p>\r\n',0,0),(68,22,11,'<p>UBS</p>\r\n',0,0),(69,22,12,'',0,0),(70,22,13,'',0,0),(74,23,11,'<p>Schwyzer Kantonalbank</p>\r\n',0,0),(75,23,12,'A',0,0),(76,23,13,'<p>Switzerland</p>\r\n',0,0),(80,25,11,'<p>Commerzbank AG</p>\r\n',0,0),(81,25,12,'',0,0),(82,25,13,'',0,0),(83,24,11,'',0,0),(84,24,12,'',0,0),(85,24,13,'',0,0),(86,26,11,'',0,0),(87,26,12,' B',0,0),(88,26,13,'',0,0),(89,27,11,'',0,0),(90,27,12,'',0,0),(91,27,13,'',0,0),(92,28,14,'no',0,0),(93,28,15,'',0,0),(94,28,17,'',0,0),(95,28,18,'',0,0),(96,28,19,'',0,0),(97,28,21,'',0,0),(98,28,23,'',0,0),(99,28,25,'',0,0),(100,28,27,'',0,0),(101,28,29,'',0,0),(102,28,30,'yes',0,0),(103,28,35,'',0,0),(104,28,36,'',0,0),(105,28,54,'',0,0),(106,28,55,'',0,0),(107,28,56,'',0,0),(108,28,58,'',0,0),(109,28,60,'no screening',0,0),(110,28,61,'',0,0),(111,29,11,'<p>Commerzbank AG</p>\r\n',0,0),(112,29,12,' B',0,0),(113,29,13,'',0,0),(114,30,14,'yes',0,0),(115,30,15,'DE99137123',0,0),(116,30,16,'no',0,0),(117,30,17,'',0,0),(118,30,18,'',0,0),(119,30,19,'',0,0),(120,30,21,'',0,0),(121,30,23,'',0,0),(122,30,25,'',0,0),(123,30,27,'',0,0),(124,30,29,'',0,0),(125,30,30,'yes',0,0),(126,30,35,'',0,0),(127,30,36,'',0,0),(128,30,54,'',0,0),(129,30,55,'',0,0),(130,30,56,'',0,0),(131,30,58,'',0,0),(132,30,60,'no screening',0,0),(133,30,61,'',0,0);
/*!40000 ALTER TABLE `user_lead_fields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_leads`
--

DROP TABLE IF EXISTS `user_leads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_leads` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `formid` int(11) NOT NULL,
  `taskid` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `IP` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `notes` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_added` int(11) NOT NULL,
  `statusid` int(11) NOT NULL,
  `sourceid` int(11) NOT NULL,
  `assignedid` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_leads`
--

LOCK TABLES `user_leads` WRITE;
/*!40000 ALTER TABLE `user_leads` DISABLE KEYS */;
INSERT INTO `user_leads` VALUES (1,0,1,0,1506851550,'10.240.0.224',0,'','Test','Mustermann','test@test.de','Germany','','Munich','Bayern','80331','Germany',0,1,4,3),(2,0,1,0,1506865830,'10.240.1.4',0,'','asfhahf','asifaihf','asfpiaf@aasd.de','asihfa','','','','','',0,1,4,3),(3,0,1,9,1507380318,'10.240.0.189',0,'','asd','a','cleme@test.de','','','','','','',0,1,4,6),(5,0,2,0,1508023461,'10.240.1.18',0,'','Clemens','Test','clenebs.schuwerk@gmx.de','','','','','','',0,1,4,0),(10,0,2,9,1508023641,'10.240.0.189',0,'','Clemens','Test','clenebs.schuwerk@gmx.de','','','','','','',0,1,4,0),(11,0,2,9,1508057003,'10.240.0.224',0,'','Clemems','Test','test@cleme.test','','','','','','',0,1,4,0),(12,0,4,9,1508062592,'10.240.1.67',0,'','','','','','','','','','',0,1,4,0),(13,0,4,10,1509902045,'10.240.1.18',0,'','','','','','','','','','',0,1,4,0),(14,0,1,18,1509994164,'10.240.1.31',0,'','Camillo','Weridhc','','','','','','','',0,1,4,3),(15,0,2,19,1509994448,'10.240.1.67',0,'','as','aa','hello@test.de','','','','','','',0,1,4,0),(16,0,5,21,1509996938,'10.240.1.184',0,'','asda','adas','test@test.de','','','','','','',0,1,4,0),(17,0,5,22,1509997434,'10.240.1.31',0,'','Cam','Wer','test@test.de','','','','','','',0,1,4,0),(18,0,5,23,1510093247,'10.240.1.4',0,'','eartes','trds','test@test.de','','','','','','',0,1,4,0),(19,0,5,23,1510093380,'10.240.1.14',0,'','wqer','sagd','test@test.de','','','','','','',0,1,4,0),(20,0,5,24,1510094220,'10.240.1.67',0,'','ads','asd','asfpiaf@aasd.de','','','','','','',0,1,4,0),(21,0,6,25,1510136291,'10.240.1.67',0,'','','','','','','','','','',0,1,4,0),(22,0,6,26,1510136370,'10.240.1.18',0,'','','','','','','','','','',0,1,4,0),(23,0,6,28,1510260791,'10.240.1.18',0,'','','','','','','','','','',0,1,4,1),(24,0,6,27,1510262737,'10.240.1.67',0,'','Test','','','','','','','','',0,1,4,1),(25,0,6,27,1510262754,'10.240.0.161',0,'','','','','','','','','','',0,1,4,1),(26,0,6,26,1510340152,'10.240.0.227',0,'','','','','','','','','','',0,1,4,1),(27,0,6,33,1518433998,'10.240.0.90',0,'','','','','','','','','','',0,1,4,1),(28,0,7,30,1518529986,'10.240.1.99',0,'','Test First Name','Test Last Name','test@test.ch','','','','','','',0,1,4,3),(29,0,6,27,1518533199,'10.240.0.185',0,'','','','','','','','','','',0,1,4,1),(30,0,7,34,1518692799,'10.240.1.0',0,'','Camillo','Werdich','test@test.de','','','','','','',0,1,4,3);
/*!40000 ALTER TABLE `user_leads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_notifications`
--

DROP TABLE IF EXISTS `user_notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_notifications` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `url` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `message` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `fromid` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=167 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_notifications`
--

LOCK TABLES `user_notifications` WRITE;
/*!40000 ALTER TABLE `user_notifications` DISABLE KEYS */;
INSERT INTO `user_notifications` VALUES (1,3,'projects',1501619312,0,'has added you to the team of a project: First Review',1),(2,1,'tasks/view/1',1501619342,1,'has assigned you to a task:First Review',1),(3,3,'tasks/view/1',1501619342,1,'has assigned you to a task:First Review',1),(4,4,'projects',1501620268,0,'has added you to the team of a project: First Review',1),(5,4,'tasks/view/1',1501620280,0,'has assigned you to a task:First Review',1),(6,3,'tasks/view/1',1501620546,0,'has assigned you to an objective:Not sure about section 2.1.5',4),(7,1,'tasks/view/1',1501620546,1,'A new Objective[Not sure about section 2.1.5] has been posted in a Task that you are assigned to:\r\n			 <strong>First Review</strong>',4),(8,3,'tasks/view/1',1501620546,1,'A new Objective[Not sure about section 2.1.5] has been posted in a Task that you are assigned to:\r\n			 <strong>First Review</strong>',4),(9,4,'tasks/view/1',1501620546,0,'A new Objective[Not sure about section 2.1.5] has been posted in a Task that you are assigned to:\r\n			 <strong>First Review</strong>',4),(10,3,'tasks/view/2',1501620914,0,'has assigned you to a task:Test_2',3),(11,1,'tasks/view/1',1502299971,1,'A new Objective[ausfüölölen] has been posted in a Task that you are assigned to:\r\n			 <strong>First Review</strong>',1),(12,3,'tasks/view/1',1502299971,0,'A new Objective[ausfüölölen] has been posted in a Task that you are assigned to:\r\n			 <strong>First Review</strong>',1),(13,4,'tasks/view/1',1502299971,0,'A new Objective[ausfüölölen] has been posted in a Task that you are assigned to:\r\n			 <strong>First Review</strong>',1),(14,1,'tasks/view/1',1503303736,1,'The status of the Task[First Review] has been changed to \r\n					 <strong>Completed</strong>',1),(15,3,'tasks/view/1',1503303736,0,'The status of the Task[First Review] has been changed to \r\n					 <strong>Completed</strong>',1),(16,4,'tasks/view/1',1503303736,0,'The status of the Task[First Review] has been changed to \r\n					 <strong>Completed</strong>',1),(17,4,'projects',1505051307,0,'has remove you from the team of a project: First Review',1),(18,4,'projects',1505051331,0,'has added you to the team of a project: First Review',1),(19,5,'projects',1505052016,0,'has added you to the team of a project: UBS Switzerland',1),(20,1,'tasks/view/3',1505052143,1,'has assigned you to a task:Bank Name',1),(21,1,'tasks/view/4',1505052163,1,'has assigned you to a task:BIC',1),(22,5,'tasks/view/4',1505052282,0,'has assigned you to a task:BIC',1),(23,5,'tasks/view/3',1505052301,0,'has assigned you to a task:Bank Name',1),(24,1,'tasks/view/5',1506680176,1,'has assigned you to a task:bic',1),(25,1,'tasks/view/6',1506847820,1,'has assigned you to a task:Onboarding',1),(26,1,'tasks/view/6',1506847937,1,'A new Objective[Test frage] has been posted in a Task that you are assigned to:\r\n			 <strong>Onboarding</strong>',1),(27,1,'tasks/view/6',1506847943,1,'The status of the Task[Onboarding] has been changed to \r\n					 <strong>Completed</strong>',1),(28,1,'tasks/view/6',1506847962,1,'A new Objective[Test Frage 2] has been posted in a Task that you are assigned to:\r\n			 <strong>Onboarding</strong>',1),(29,1,'tasks/view/6',1506847969,1,'A new Objective[Test Frage 3] has been posted in a Task that you are assigned to:\r\n			 <strong>Onboarding</strong>',1),(30,1,'tasks/view/3',1506848009,1,'The Task[Bank Name] has been deleted',1),(31,5,'tasks/view/3',1506848009,0,'The Task[Bank Name] has been deleted',1),(32,1,'tasks/view/5',1506848012,1,'The Task[bic] has been deleted',1),(33,1,'tasks/view/4',1506848016,1,'The Task[BIC] has been deleted',1),(34,5,'tasks/view/4',1506848016,0,'The Task[BIC] has been deleted',1),(35,1,'tasks/view/7',1506848178,1,'has assigned you to a task:UBS Switzerland',1),(36,1,'tasks/view/8',1506848222,1,'has assigned you to a task:Commerzbank AG',1),(37,5,'projects',1506848541,1,'has added you to the team of a project: KYC - Client Onboarding 2017',1),(38,5,'tasks/view/6',1506848729,0,'has assigned you to a task:Deutsche Bank',1),(39,1,'tasks/view/6',1506848902,1,'The status of the Task[Deutsche Bank] has been changed to \r\n					 <strong>Completed</strong>',5),(40,5,'tasks/view/6',1506848902,0,'The status of the Task[Deutsche Bank] has been changed to \r\n					 <strong>Completed</strong>',5),(41,1,'tasks/view/6',1506848915,1,'The status of the Task[Deutsche Bank] has been changed to \r\n					 <strong>In Progress</strong>',5),(42,5,'tasks/view/6',1506848915,0,'The status of the Task[Deutsche Bank] has been changed to \r\n					 <strong>In Progress</strong>',5),(43,1,'tasks/view/6',1506848951,1,'A new message has been posted in a Task that you are assigned to:\r\n			 <strong>Deutsche Bank</strong>',5),(44,5,'tasks/view/6',1506848952,0,'A new message has been posted in a Task that you are assigned to:\r\n			 <strong>Deutsche Bank</strong>',5),(45,3,'leads/view_lead/1',1506851550,0,'a new lead has arrived!',1),(46,3,'leads/view_lead/2',1506865830,0,'a new lead has arrived!',1),(47,3,'leads/view_lead/3',1507380318,0,'a new lead has arrived!',1),(48,1,'tasks/view/6',1507383237,1,'The status of the Task[Deutsche Bank] has been changed to \r\n					 <strong>Completed</strong>',1),(49,5,'tasks/view/6',1507383237,0,'The status of the Task[Deutsche Bank] has been changed to \r\n					 <strong>Completed</strong>',1),(50,6,'tasks/view/9',1508007346,0,'has assigned you to a task:Bank 1',6),(51,6,'tasks/view/9',1508009659,0,'A new Objective[TestObjective] has been posted in a Task that you are assigned to:\r\n			 <strong>Bank 1</strong>',6),(52,6,'tasks/view/9',1508057625,0,'The status of the Task[Bank 1] has been changed to \r\n				 <strong>In Progress</strong>',6),(53,6,'tasks/view/9',1508057628,0,'The status of the Task[Bank 1] has been changed to \r\n				 <strong>Completed</strong>',6),(54,6,'tasks/view/9',1508057630,0,'The status of the Task[Bank 1] has been changed to \r\n				 <strong>New</strong>',6),(55,6,'tasks/view/9',1508058654,0,'The status of the Task[Bank 1] has been changed to \r\n				 <strong>In Progress</strong>',6),(56,6,'tasks/view/9',1508058659,0,'The status of the Task[Bank 1] has been changed to \r\n				 <strong>New</strong>',6),(57,6,'tasks/view/9',1508059551,0,'The status of the Task[Bank 1] has been changed to \r\n					 <strong>Completed</strong>',6),(58,6,'tasks/view/9',1508059570,0,'The status of the Task[Bank 1] has been changed to \r\n					 <strong>In Progress</strong>',6),(59,6,'tasks/view/10',1508061399,0,'has assigned you to a task:Test Hash',6),(60,6,'tasks/view/11',1508065257,0,'has assigned you to a task:Test 4',6),(61,6,'tasks/view/11',1508065294,0,'The Task[Test 4] has been deleted',6),(62,6,'tasks/view/12',1508065421,0,'has assigned you to a task:test 5',6),(63,6,'tasks/view/13',1508065455,0,'has assigned you to a task:Task 5',6),(64,6,'tasks/view/14',1508065560,0,'has assigned you to a task:Test 6',6),(65,6,'tasks/view/15',1508065581,0,'has assigned you to a task:Test 7',6),(66,6,'tasks/view/15',1508065597,0,'The Task[Test 7] has been deleted',6),(67,6,'tasks/view/14',1508065608,1,'The Task[Test 6] has been deleted',6),(68,6,'tasks/view/13',1508065617,1,'The Task[Task 5] has been deleted',6),(69,1,'tasks/view/16',1508068371,1,'has assigned you to a task:UBS Switzerland Germany',1),(70,5,'tasks/view/16',1508068371,0,'has assigned you to a task:UBS Switzerland Germany',1),(71,6,'tasks/view/17',1509907010,0,'has assigned you to a task:Bank 3',6),(72,6,'tasks/view/10',1509908431,0,'The status of the Task[Bank 2] has been changed to \r\n				 <strong>Completed</strong>',6),(73,6,'tasks/view/9',1509908529,0,'The status of the Task[Bank 1] has been changed to \r\n				 <strong>Completed</strong>',6),(74,6,'tasks/view/9',1509908607,0,'The status of the Task[Bank 1] has been changed to \r\n				 <strong>In Progress</strong>',6),(75,6,'tasks/view/9',1509908614,0,'The status of the Task[Bank 1] has been changed to \r\n				 <strong>Completed</strong>',6),(76,6,'tasks/view/10',1509909997,0,'The status of the Task[Bank 2] has been changed to \r\n				 <strong>In Progress</strong>',6),(77,6,'tasks/view/10',1509910000,0,'The status of the Task[Bank 2] has been changed to \r\n				 <strong>Completed</strong>',6),(78,1,'tasks/view/18',1509994128,1,'has assigned you to a task:TEST Bank 10',1),(79,3,'leads/view_lead/14',1509994164,0,'a new lead has arrived!',1),(80,1,'tasks/view/18',1509994181,1,'The status of the Task[TEST Bank 10] has been changed to \r\n				 <strong>Completed</strong>',1),(81,1,'tasks/view/19',1509994404,1,'has assigned you to a task:Bank test 11',1),(82,1,'tasks/view/20',1509996643,1,'has assigned you to a task:Test Camillo',1),(83,1,'tasks/view/21',1509996901,1,'has assigned you to a task:Camillo test v_2',1),(84,1,'tasks/view/22',1509997391,1,'has assigned you to a task:UBS Switzerland',1),(85,1,'tasks/view/23',1510093188,1,'has assigned you to a task:Marianas Bank',1),(86,1,'tasks/view/23',1510093390,1,'The status of the Task[Marianas Bank] has been changed to \r\n				 <strong>Completed</strong>',1),(87,1,'tasks/view/24',1510094198,1,'has assigned you to a task:test  3',1),(88,1,'tasks/view/25',1510136267,1,'has assigned you to a task:Rabobank Netherlands',1),(89,1,'tasks/view/25',1510136301,1,'The status of the Task[Rabobank Netherlands] has been changed to \r\n				 <strong>Completed</strong>',1),(90,1,'tasks/view/26',1510136356,1,'has assigned you to a task:UBS Switzerland',1),(91,1,'tasks/view/27',1510176614,1,'has assigned you to a task:Commerzbank AG',1),(92,3,'projects',1510176673,0,'has added you to the team of a project: KYC - Client Review 2017',1),(93,3,'tasks/view/27',1510176689,1,'has assigned you to a task:Commerzbank AG',1),(94,1,'tasks/view/27',1510176701,1,'has removed you from a task: Commerzbank AG',1),(95,1,'tasks/view/28',1510259369,0,'has assigned you to a task:Schwyzer Kantonalbank',1),(96,3,'tasks/view/28',1510259369,0,'has assigned you to a task:Schwyzer Kantonalbank',1),(97,1,'tasks/view/28',1510259683,0,'A new message has been posted in a Task that you are assigned to:\r\n			 <strong>Schwyzer Kantonalbank</strong>',1),(98,3,'tasks/view/28',1510259683,0,'A new message has been posted in a Task that you are assigned to:\r\n			 <strong>Schwyzer Kantonalbank</strong>',1),(99,1,'leads/view_lead/23',1510260791,0,'a new template has arrived!',1),(100,1,'tasks/view/28',1510261389,0,'The status of the Task[Schwyzer Kantonalbank] has been changed to \r\n				 <strong>Completed</strong>',1),(101,3,'tasks/view/28',1510261389,1,'The status of the Task[Schwyzer Kantonalbank] has been changed to \r\n				 <strong>Completed</strong>',1),(102,1,'leads/view_lead/24',1510262737,0,'a new template has arrived!',1),(103,1,'leads/view_lead/25',1510262754,0,'a new template has arrived!',1),(104,1,'tasks/view/28',1510305209,0,'A new message has been posted in a Task that you are assigned to:\r\n			 <strong>Schwyzer Kantonalbank</strong>',1),(105,3,'tasks/view/28',1510305210,0,'A new message has been posted in a Task that you are assigned to:\r\n			 <strong>Schwyzer Kantonalbank</strong>',1),(106,3,'projects',1510339648,0,'has added you to the team of a Report Cycle: test',1),(107,5,'projects',1510339661,0,'has added you to the team of a Report Cycle: KYC - Client Review 2017',1),(108,1,'tasks/view/29',1510339852,0,'has assigned you to a Bank:test bank 1',1),(109,3,'tasks/view/29',1510339852,0,'has assigned you to a Bank:test bank 1',1),(110,4,'projects',1510339875,0,'has added you to the team of a Report Cycle: test',1),(111,4,'tasks/view/29',1510339904,0,'has assigned you to a Bank:test bank 1',1),(112,1,'leads/view_lead/26',1510340152,0,'a new template has arrived!',1),(113,1,'tasks/view/26',1510340234,0,'A new message has been posted in a Task that you are assigned to:\r\n			 <strong>UBS Switzerland</strong>',1),(114,7,'projects',1510346500,0,'has added you to the team of a Report Cycle: KYC - Client Review 2017',1),(115,7,'tasks/view/27',1510346532,0,'has assigned you to a Bank:Commerzbank AG',1),(116,7,'tasks/view/25',1510346561,0,'has assigned you to a Bank:Rabobank Netherlands',1),(117,1,'tasks/view/30',1510346628,0,'has assigned you to a Bank:Credit Swiss',1),(118,3,'tasks/view/30',1510346628,0,'has assigned you to a Bank:Credit Swiss',1),(119,7,'tasks/view/30',1510346628,0,'has assigned you to a Bank:Credit Swiss',1),(120,3,'tasks/view/31',1510346771,0,'has assigned you to a Bank:Test für Template &quot;KYC CB 2017&quot;',3),(121,1,'tasks/view/30',1510346963,0,'attached a new file <b>Annal report</b> to a Bank: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/tasks/view/30\'>Credit Swiss</a>',7),(122,3,'tasks/view/30',1510346963,0,'attached a new file <b>Annal report</b> to a Bank: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/tasks/view/30\'>Credit Swiss</a>',7),(123,7,'tasks/view/30',1510346963,0,'attached a new file <b>Annal report</b> to a Bank: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/tasks/view/30\'>Credit Swiss</a>',7),(124,1,'tasks/view/30',1510488352,0,'has removed you from a Bank: Credit Swiss',1),(125,1,'tasks/view/26',1510488395,0,'The status of the Task[UBS Switzerland] has been changed to \r\n				 <strong>In Progress</strong>',1),(126,3,'services/edit_order/1',1510488490,0,'You have a new ordered service!',1),(127,1,'tasks/view/32',1518433666,0,'has assigned you to a Bank:Hypo Real Estate',1),(128,3,'tasks/view/32',1518433666,0,'has assigned you to a Bank:Hypo Real Estate',1),(129,7,'tasks/view/32',1518433666,0,'has assigned you to a Bank:Hypo Real Estate',1),(130,1,'tasks/view/33',1518433806,0,'has assigned you to a Bank:Commerzbank AG',1),(131,3,'projects',1518433830,0,'has added you to the team of a Report Cycle: KYC 2018',1),(132,3,'tasks/view/33',1518433866,0,'has assigned you to a Bank:Commerzbank AG',1),(133,1,'leads/view_lead/27',1518433998,0,'a new template has arrived!',1),(134,3,'tasks/view/31',1518519739,0,'The Task[Test für Template &quot;KYC CB 2017&quot;] has been deleted',3),(135,3,'tasks/view/30',1518527895,0,'attached a new file <b>Annual Report Credit Suisse 2016</b> to a Bank: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/tasks/view/30\'>Credit Suisse</a>',3),(136,7,'tasks/view/30',1518527895,0,'attached a new file <b>Annual Report Credit Suisse 2016</b> to a Bank: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/tasks/view/30\'>Credit Suisse</a>',3),(137,3,'leads/view_lead/28',1518529986,0,'a new template has arrived!',1),(138,1,'tasks/view/34',1518530609,0,'has assigned you to a Bank:DZ Bank',3),(139,3,'tasks/view/34',1518530609,0,'has assigned you to a Bank:DZ Bank',3),(140,1,'leads/view_lead/29',1518533199,0,'a new template has arrived!',1),(141,7,'projects',1518544996,0,'has added you to the team of a Report Cycle: KYC 2018',3),(142,1,'tasks/view/35',1518633365,0,'has assigned you to a Bank:Credit Swiss',1),(143,3,'tasks/view/35',1518633365,0,'has assigned you to a Bank:Credit Swiss',1),(144,7,'tasks/view/35',1518633365,0,'has assigned you to a Bank:Credit Swiss',1),(145,1,'tasks/view/35',1518633432,0,'attached a new file <b>Credit Suisse 2017 Q3 Report</b> to a Bank: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/tasks/view/35\'>Credit Swiss</a>',1),(146,3,'tasks/view/35',1518633432,0,'attached a new file <b>Credit Suisse 2017 Q3 Report</b> to a Bank: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/tasks/view/35\'>Credit Swiss</a>',1),(147,7,'tasks/view/35',1518633432,0,'attached a new file <b>Credit Suisse 2017 Q3 Report</b> to a Bank: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/tasks/view/35\'>Credit Swiss</a>',1),(148,1,'tasks/view/35',1518633441,0,'attached a new file <b>Credit Suisse 2017 Q1 Report</b> to a Bank: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/tasks/view/35\'>Credit Swiss</a>',1),(149,3,'tasks/view/35',1518633441,0,'attached a new file <b>Credit Suisse 2017 Q1 Report</b> to a Bank: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/tasks/view/35\'>Credit Swiss</a>',1),(150,7,'tasks/view/35',1518633441,0,'attached a new file <b>Credit Suisse 2017 Q1 Report</b> to a Bank: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/tasks/view/35\'>Credit Swiss</a>',1),(151,1,'tasks/view/35',1518633450,0,'attached a new file <b>Credit Suisse 2017 Q2 Report</b> to a Bank: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/tasks/view/35\'>Credit Swiss</a>',1),(152,3,'tasks/view/35',1518633450,0,'attached a new file <b>Credit Suisse 2017 Q2 Report</b> to a Bank: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/tasks/view/35\'>Credit Swiss</a>',1),(153,7,'tasks/view/35',1518633450,0,'attached a new file <b>Credit Suisse 2017 Q2 Report</b> to a Bank: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/tasks/view/35\'>Credit Swiss</a>',1),(154,1,'tasks/view/33',1518633478,0,'attached a new file <b>UBS 2017 Q4 Report</b> to a Bank: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/tasks/view/33\'>Commerzbank AG</a>',1),(155,3,'tasks/view/33',1518633478,0,'attached a new file <b>UBS 2017 Q4 Report</b> to a Bank: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/tasks/view/33\'>Commerzbank AG</a>',1),(156,1,'tasks/view/33',1518689515,1,'The status of the Task[Commerzbank AG] has been changed to \r\n				 <strong>Completed</strong>',1),(157,3,'tasks/view/33',1518689515,0,'The status of the Task[Commerzbank AG] has been changed to \r\n				 <strong>Completed</strong>',1),(158,8,'projects',1518690583,0,'has added you to the team of a Report Cycle: KYC 2018',1),(159,8,'projects',1518690589,1,'has added you to the team of a Report Cycle: KYC 2017',3),(160,3,'leads/view_lead/30',1518692799,0,'a new template has arrived!',1),(161,8,'tasks/view/36',1518696076,0,'has assigned you to a Bank:Bar',8),(162,1,'tasks/view/37',1518699972,0,'has assigned you to a Bank:Rabobank Netherlands',1),(163,3,'tasks/view/37',1518699972,0,'has assigned you to a Bank:Rabobank Netherlands',1),(164,1,'tasks/view/35',1519944401,0,'attached a new file <b>2016 - Sparkasse</b> to a Bank: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/tasks/view/35\'>Credit Suisse</a>',1),(165,3,'tasks/view/35',1519944401,0,'attached a new file <b>2016 - Sparkasse</b> to a Bank: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/tasks/view/35\'>Credit Suisse</a>',1),(166,7,'tasks/view/35',1519944401,0,'attached a new file <b>2016 - Sparkasse</b> to a Bank: <a href=\'https://project-compex-test-cwerdich.c9users.io/crm/index.php/tasks/view/35\'>Credit Suisse</a>',1);
/*!40000 ALTER TABLE `user_notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role_permissions`
--

DROP TABLE IF EXISTS `user_role_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_role_permissions` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `classname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hook` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role_permissions`
--

LOCK TABLES `user_role_permissions` WRITE;
/*!40000 ALTER TABLE `user_role_permissions` DISABLE KEYS */;
INSERT INTO `user_role_permissions` VALUES (1,'ctn_308','ctn_308','admin','admin'),(2,'ctn_309','ctn_309','admin','admin_settings'),(3,'ctn_310','ctn_310','admin','admin_members'),(4,'ctn_311','ctn_311','admin','admin_payment'),(5,'ctn_33','ctn_33','banned','banned'),(6,'ctn_362','ctn_384','project','project_admin'),(7,'ctn_367','ctn_385','project','project_worker'),(8,'ctn_364','ctn_387','project','time_manage'),(9,'ctn_365','ctn_388','project','team_worker'),(10,'ctn_366','ctn_389','project','time_worker'),(11,'ctn_369','ctn_390','project','file_worker'),(12,'ctn_368','ctn_391','project','file_manage'),(13,'ctn_371','ctn_392','project','task_worker'),(14,'ctn_370','ctn_393','project','task_manage'),(15,'ctn_1189','ctn_1190','project','services_manage'),(16,'ctn_372','ctn_394','project','calendar_manage'),(17,'ctn_373','ctn_395','project','calendar_worker'),(18,'ctn_374','ctn_396','project','ticket_manage'),(19,'ctn_375','ctn_397','project','ticket_worker'),(20,'ctn_376','ctn_398','project','finance_manage'),(21,'ctn_377','ctn_399','project','finance_worker'),(22,'ctn_378','ctn_400','project','invoice_manage'),(23,'ctn_379','ctn_401','project','invoice_client'),(24,'ctn_380','ctn_402','project','ticket_client'),(25,'ctn_1185','ctn_1186','project','project_client'),(26,'ctn_1187','ctn_1188','project','task_client'),(27,'ctn_381','ctn_403','project','notes_manage'),(28,'ctn_382','ctn_404','project','notes_worker'),(29,'ctn_383','ctn_405','project','lead_manage'),(30,'ctn_1142','ctn_1143','project','reports_manage'),(31,'ctn_1144','ctn_1145','project','reports_worker'),(32,'ctn_363','ctn_386','project','team_manage'),(33,'ctn_1265','ctn_1266','project','live_chat');
/*!40000 ALTER TABLE `user_role_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_roles` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin` int(11) NOT NULL,
  `admin_settings` int(11) NOT NULL,
  `admin_members` int(11) NOT NULL,
  `admin_payment` int(11) NOT NULL,
  `project_admin` int(11) NOT NULL,
  `project_worker` int(11) NOT NULL,
  `team_manage` int(11) NOT NULL,
  `time_manage` int(11) NOT NULL,
  `team_worker` int(11) NOT NULL,
  `time_worker` int(11) NOT NULL,
  `file_manage` int(11) NOT NULL,
  `file_worker` int(11) NOT NULL,
  `task_manage` int(11) NOT NULL,
  `task_worker` int(11) NOT NULL,
  `calendar_manage` int(11) NOT NULL,
  `calendar_worker` int(11) NOT NULL,
  `ticket_manage` int(11) NOT NULL,
  `ticket_worker` int(11) NOT NULL,
  `finance_worker` int(11) NOT NULL,
  `finance_manage` int(11) NOT NULL,
  `invoice_manage` int(11) NOT NULL,
  `invoice_client` int(11) NOT NULL,
  `ticket_client` int(11) NOT NULL,
  `notes_manage` int(11) NOT NULL,
  `notes_worker` int(11) NOT NULL,
  `lead_manage` int(11) NOT NULL,
  `banned` int(11) NOT NULL,
  `reports_manage` int(11) NOT NULL,
  `reports_worker` int(11) NOT NULL,
  `project_client` int(11) NOT NULL,
  `task_client` int(11) NOT NULL,
  `services_manage` int(11) NOT NULL,
  `live_chat` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
INSERT INTO `user_roles` VALUES (1,'Admin',1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(2,'Member Manager',0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(3,'Admin Settings',0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(4,'Admin Payments',0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(5,'Time Manager',0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(6,'Project Admin',0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(7,'Default User',0,0,0,0,0,1,0,0,1,1,0,1,0,1,0,1,0,1,1,0,0,0,0,0,1,0,0,0,1,0,0,0,1),(8,'Calendar Manager',0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(9,'Finance Manager',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(10,'Invoice Manager',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0),(11,'Client',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0,0,0,0,0,0,1,1,0,1),(12,'Notes Manager',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0),(13,'Lead Manage',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0),(14,'Ticket Manager',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(15,'Team Manager',0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(16,'File Manager',0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(17,'Task Manager',0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(19,'Banned',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0),(20,'Reports Manager',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0),(21,'Services Manage',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0),(22,'Analyst',0,0,0,0,0,0,0,0,0,1,1,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1);
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_service_fields`
--

DROP TABLE IF EXISTS `user_service_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_service_fields` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `serviceid` int(11) NOT NULL,
  `fieldid` int(11) NOT NULL,
  `answer` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_service_fields`
--

LOCK TABLES `user_service_fields` WRITE;
/*!40000 ALTER TABLE `user_service_fields` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_service_fields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_services`
--

DROP TABLE IF EXISTS `user_services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_services` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `formid` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `IP` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `invoiceid` int(11) NOT NULL,
  `email` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `total_cost` decimal(10,2) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_services`
--

LOCK TABLES `user_services` WRITE;
/*!40000 ALTER TABLE `user_services` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_timers`
--

DROP TABLE IF EXISTS `user_timers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_timers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `start_time` int(11) NOT NULL,
  `end_time` int(11) NOT NULL,
  `added` int(11) NOT NULL,
  `projectid` int(11) NOT NULL,
  `note` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `date_stamp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `taskid` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_timers`
--

LOCK TABLES `user_timers` WRITE;
/*!40000 ALTER TABLE `user_timers` DISABLE KEYS */;
INSERT INTO `user_timers` VALUES (1,6,1508062345,0,1508062345,5,'',0.00,'2017-10-15',10),(2,6,1508062363,0,1508062363,5,'',0.00,'2017-10-15',10),(3,6,1509904884,0,1509904884,5,'',0.00,'2017-11-05',10),(4,1,1510302348,1510305348,1510305114,7,'Review time',100.00,'2017-11-10',25),(5,1,1510305146,1510305155,1510305146,0,'Friday Timer',0.00,'2017-11-10',0),(6,1,1510305157,1510340475,1510305157,0,'Friday Timer',0.00,'2017-11-10',0),(7,1,1510305219,1510338786,1510305219,7,'',0.00,'2017-11-10',28),(8,1,1518425042,1518434042,1510340460,9,'',75.00,'2017-11-10',33),(9,1,1518433944,1518434010,1518433944,0,'Monday Timer',0.00,'2018-02-12',0),(10,1,1518425107,1518434107,1518434071,9,'Review time',75.00,'2018-02-12',33),(11,1,1518694874,1518699874,1518434135,9,'QC',90.00,'2018-02-12',33),(12,1,1518679863,1518699863,1518699849,0,'Thursday Timer',0.00,'2018-02-15',0);
/*!40000 ALTER TABLE `user_timers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `IP` varchar(500) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.png',
  `joined` int(11) NOT NULL,
  `joined_date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `online_timestamp` int(11) NOT NULL,
  `oauth_provider` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_id` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_token` varchar(1500) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_secret` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `email_notification` int(11) NOT NULL DEFAULT '1',
  `aboutme` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `points` decimal(10,2) NOT NULL,
  `premium_time` int(11) NOT NULL,
  `user_role` int(11) NOT NULL,
  `premium_planid` int(11) NOT NULL,
  `noti_count` int(11) NOT NULL,
  `email_count` int(11) NOT NULL,
  `active_projectid` int(11) NOT NULL,
  `timer_count` int(11) NOT NULL,
  `time_rate` decimal(10,2) NOT NULL,
  `address_1` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `address_2` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `activate_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_comments` int(11) NOT NULL DEFAULT '1',
  `profile_views` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'camillo.werdich@me.com','$2a$12$dzLEp9p55LIETPI0rhm06.uByUm.O6VwayDGil4/Bw3gT3rOZrdRG','ff87602cee9f442de635a58f80531a51','10.240.1.31','Camillo_admin','Camillo','Werdich','95e401f03ca98f64aa9f791a269c4a6c.jpg',1501615506,'8-2017',1519983160,'','','','',1,'',0.00,0,1,0,26,0,0,-1,0.00,'','','','','','',1,'',1,4),(3,'jan.spoerer@whu.edu','$2a$12$bX8Rydbg112Hqb3xpQfYyOkioHRoLgAJ60K4EGgFdJHQe2ijGDccu','ea753bd7f6438e2c85c14930f0b4325c','10.240.1.31','janspoerer','Jan','Spörer','072dab28277e3f56b94bfdfe18cd28fa.JPG',1501618851,'8-2017',1519311070,'','','','',1,'Hi! I&#039;m Jan, the co-founder of Compex and will help you with any questions about our software. You can reach me or another Compex expert through our hotline.',0.00,0,1,0,35,0,0,0,0.00,'Hermann-Löns-Straße 5','','Netphen','NRW','57250','Germany',1,'',1,2),(6,'clemens@test.de','$2a$12$PPL93X8q3/sPy4Cmm.1n8eAwKnYcNBCvuzHYMaWQQm3h7q4lH7B7y','19fac6ae8b5e4be3f39c0b3a765553b3','10.240.1.31','Clemens_Schuwerk','Clemens','Schuwerk','default.png',1507391693,'10-2017',1509998704,'','','','',1,'',0.00,0,1,0,24,0,5,3,0.00,'','','','','','',1,'',1,2),(7,'analyst@compex.com','$2a$12$lD56PFC2U9NFN2I7dlfGCep21s9I61nKs8/4tIed50WrmP.z3.GqW','e4a0d3d8249cd6806abaddc006ff295e','10.240.0.161','AnalystCompex','Max','Muster','default.png',1510346434,'11-2017',1519309542,'','','','',1,'',0.00,0,22,0,14,0,0,0,0.00,'','','','','','',1,'',1,1),(8,'malte@test.de','$2a$12$ywzKafLGhtVSjmlKowKJXu6pwp9.uEFFMxFCJ1fmL.ZrakZOS2x4e','d6e4dc47c34567a98b5f9c2e4ab72030','10.240.1.220','Malte_Schwarzer','Malte','Schwarzer','default.png',1518689140,'2-2018',1519986441,'','','','',1,'',0.00,0,1,0,2,0,0,0,0.00,'','','','','','',1,'',1,0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-02 11:39:05
