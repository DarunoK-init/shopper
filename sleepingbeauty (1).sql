-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2020 at 05:44 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sleepingbeauty`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CART_ID` bigint(20) UNSIGNED NOT NULL,
  `CART_CUSID` bigint(20) UNSIGNED DEFAULT NULL,
  `CART_PRODID` bigint(20) NOT NULL,
  `CART_PRODNUM` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`CART_ID`, `CART_CUSID`, `CART_PRODID`, `CART_PRODNUM`) VALUES
(51, 2, 200012, 1),
(52, 2, 400005, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CUS_ID` bigint(20) UNSIGNED NOT NULL,
  `CUS_USERNAME` varchar(20) DEFAULT NULL,
  `CUS_PASSWD` varchar(20) DEFAULT NULL,
  `CUS_NAME` varchar(40) DEFAULT NULL,
  `CUS_TEL` varchar(13) DEFAULT NULL,
  `CUS_ADDR` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CUS_ID`, `CUS_USERNAME`, `CUS_PASSWD`, `CUS_NAME`, `CUS_TEL`, `CUS_ADDR`) VALUES
(2, 'ununo', 'unno1', 'Tanakorn Kantaswuan', '+66864409407', '99 m18 klongluang patum 12120'),
(3, 'pondd', 'ppond', 'Pornpak Pakdeethai', '+66898989898', '184/2 jaengwattana bangkok 10200'),
(4, 'aumm', 'aaum', 'Phattharaporn Chuenlerssakul', '+66989898989', '124/8 rajprasong rd, bangkok 10200'),
(5, 'nonc', 'noncc', 'Chayanon noisapung', '+6684845484', 'sth +sth +sth');

-- --------------------------------------------------------

--
-- Table structure for table `orderr`
--

CREATE TABLE `orderr` (
  `ORD_ID` bigint(20) UNSIGNED NOT NULL,
  `ORD_SUBID` bigint(20) UNSIGNED NOT NULL,
  `ORD_CUSID` bigint(20) UNSIGNED DEFAULT NULL,
  `ORD_PRODID` bigint(20) UNSIGNED DEFAULT NULL,
  `ORD_ITEMNUM` int(11) DEFAULT NULL,
  `ORD_AMOUNT` int(11) DEFAULT NULL,
  `ORD_DATE` date DEFAULT NULL,
  `ORD_TIME` time DEFAULT NULL,
  `ORD_STATUS` varchar(100) DEFAULT NULL,
  `ORD_ADDR` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderr`
--

INSERT INTO `orderr` (`ORD_ID`, `ORD_SUBID`, `ORD_CUSID`, `ORD_PRODID`, `ORD_ITEMNUM`, `ORD_AMOUNT`, `ORD_DATE`, `ORD_TIME`, `ORD_STATUS`, `ORD_ADDR`) VALUES
(22, 22, 2, 100003, 1, 5400, '2020-11-21', '18:19:00', 'Shipping', '291/4 sansai mueng chiang rai chaing rai'),
(23, 22, 2, 200001, 1, 5400, '2020-11-21', '18:19:00', 'Shipping', '291/4 sansai mueng chiang rai chaing rai'),
(24, 22, 2, 400004, 1, 5400, '2020-11-21', '18:19:00', 'Shipping', '291/4 sansai mueng chiang rai chaing rai'),
(25, 23, 2, 400002, 3, 2490, '2020-11-22', '01:41:41', 'Preparing', '99 m18 klongluang patum 12120'),
(26, 23, 2, 200003, 1, 2490, '2020-11-22', '01:41:41', 'Preparing', '99 m18 klongluang patum 12120'),
(27, 24, 3, 100003, 1, 2540, '2020-11-22', '19:15:51', 'Shipping', '184/2 jaengwattana bangkok 10200'),
(28, 24, 3, 400006, 1, 2540, '2020-11-22', '19:15:51', 'Shipping', '184/2 jaengwattana bangkok 10200'),
(29, 25, 5, 200012, 1, 3730, '2020-11-23', '08:48:37', 'Out of Order', '99 m18 klongluang patum 12120'),
(30, 25, 5, 400005, 1, 3730, '2020-11-23', '08:48:37', 'Out of Order', '99 m18 klongluang patum 12120'),
(31, 25, 5, 400006, 3, 3730, '2020-11-23', '08:48:37', 'Out of Order', 'sth +sth +sth'),
(32, 25, 5, 100006, 1, 3730, '2020-11-23', '08:48:37', 'Out of Order', 'sth +sth +sth');

--
-- Triggers `orderr`
--
DELIMITER $$
CREATE TRIGGER `deletfromcart` AFTER INSERT ON `orderr` FOR EACH ROW BEGIN
	SET @cid=new.ORD_CUSID;
    DELETE cart.* FROM cart WHERE cart.CART_CUSID=@cid;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `processs`
--

CREATE TABLE `processs` (
  `PROC_ID` bigint(20) UNSIGNED NOT NULL,
  `PROC_CUSID` bigint(20) UNSIGNED DEFAULT NULL,
  `PROC_DATE` date DEFAULT NULL,
  `PROC_TIME` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `processs`
--

INSERT INTO `processs` (`PROC_ID`, `PROC_CUSID`, `PROC_DATE`, `PROC_TIME`) VALUES
(1, 2, '2020-11-18', '01:06:52'),
(2, 2, '2020-11-18', '01:08:29'),
(3, 2, '2020-11-18', '01:12:28'),
(4, 2, '2020-11-18', '01:20:48'),
(5, 2, '2020-11-18', '01:21:41'),
(6, 2, '2020-11-18', '01:22:10'),
(7, 2, '2020-11-18', '01:24:27'),
(8, 2, '2020-11-18', '01:27:29'),
(9, 2, '2020-11-18', '01:30:34'),
(10, 2, '2020-11-18', '01:36:05'),
(11, 2, '2020-11-18', '01:41:37'),
(12, 2, '2020-11-18', '01:44:27'),
(13, 2, '2020-11-18', '01:45:20'),
(14, 2, '2020-11-18', '02:17:16'),
(15, 2, '2020-11-18', '16:51:08'),
(16, 2, '2020-11-18', '17:03:18'),
(17, 2, '2020-11-18', '17:20:25'),
(18, 2, '2020-11-21', '15:37:27'),
(19, 2, '2020-11-21', '16:57:25'),
(20, 2, '2020-11-21', '16:58:23'),
(21, 2, '2020-11-21', '18:17:20'),
(22, 2, '2020-11-21', '18:19:00'),
(23, 2, '2020-11-22', '01:41:41'),
(24, 3, '2020-11-22', '19:15:51'),
(25, 5, '2020-11-23', '08:48:37');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `PROD_ID` bigint(20) UNSIGNED NOT NULL,
  `PROD_NAME` varchar(200) DEFAULT NULL,
  `PROD_BRAND` varchar(200) DEFAULT NULL,
  `PROD_INFO` varchar(535) DEFAULT NULL,
  `PROD_TYPE` varchar(25) DEFAULT NULL,
  `PROD_PRICE` int(11) DEFAULT NULL,
  `PROD_PICID` varchar(25) DEFAULT NULL,
  `PROD_DIS` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`PROD_ID`, `PROD_NAME`, `PROD_BRAND`, `PROD_INFO`, `PROD_TYPE`, `PROD_PRICE`, `PROD_PICID`, `PROD_DIS`) VALUES
(100001, 'Glow Face Palette', 'DIOR BACKSTAGE', 'A face palette that illuminates for instant radiance and a natural glow.', 'Palette', 2050, 'C1', 'Sale'),
(100002, 'Ambient Lighting Blush', 'HOURGLASS', 'This groundbreaking hybrid combines the customized lighting effects of Ambient® Lighting Powder with a spectrum of breathtakingly modern hues. The result is seamless, soft-focus and multidimensional color.', 'Blush', 1650, 'C2', 'Popular'),
(100003, 'O!Mega Bronzer Perfect Tantric', 'MARC JACOBS BEAUTY', '1780', 'Bronzer', 1780, 'C3', 'New'),
(100004, 'Blush', 'NARS', 'NARS Blush offers a range of translucent, natural shades, each with a subtle pink for a natural-looking blush undertone to highlight the complexion. Designed to be worn alone or layered together for more depth, it provides a healthy glow that flatters any skintone.', 'Blush', 1250, 'C4', 'Normal'),
(100005, 'Match Stix Matte Skinstick', 'FENTY BEAUTY', 'A magnetized makeup stick in a longwear, light-as-air matte formula to conceal, correct, contour, and touch up in 20 shades', 'Concealer', 990, 'C5', 'Popular'),
(100006, 'The POREfessional Face Primer', 'BENEFIT COSMETICS', 'PRO balm to minimize the appearance of pore', 'primer', 1450, 'C6', 'Sale'),
(100007, 'Hamptons Weekender Contour Palette', 'TARTE', 'Accessorize your summer tan with these contour, blush, and highlight shades. The matte blush and contour shades provide buildable, streak-free color on every complexion, and the champagne highlighter delivers a lit-from-within radiance. The skin-balancing, long-wearing Amazonian clay formula will keep your glow looking gorgeous from summer-Friday to Sunday-funday.', 'contour', 825, 'C7', 'Normal'),
(100008, 'Forever Skin Correct', 'DIOR', 'A multi-use concealer that can also be used as a targeted foundation, contour cream and brightener.', 'foundation', 1500, 'C8', 'Popular'),
(100009, 'Translucent Loose Setting Powder', 'LAURA MERCIER', 'An award-winning, silky powder with a touch of sheer coverage to set makeup for lasting wear.', 'powder', 1690, 'C9', 'New'),
(100010, 'Glow Play Blush', 'MAC COSMETICS', 'An innovative bouncy blush with a cushiony texture in blendable shades.', 'blush', 1400, 'C10', 'Sale'),
(100011, 'All Nighter Setting Spray', 'URBAN DECAY', 'Is makeup meltdown ruining your midnight mojo? Mist on this weightless spray to give your makeup serious staying power. All Nighter keeps your makeup looking gorgeously just-applied for up to 16 hours – without melting, cracking, fading or settling into fine lines. \r\n\r\nDeveloped in an exclusive partnership with SKINDINÄVIA, our groundbreaking, clinically tested formula is suitable for all skin types and features patented Temperature Control  Technology. Yep, this baby actually lowers the temperature of your makeup to keep foundat', 'spray', 1400, 'C11', 'New'),
(100012, 'Natural Radiant Longwear Foundation', 'NARS', 'Introducing NARS’ first 16-hour foundation that stays turned on by the power of radiance. Untraceable. Unstoppable. Unlike anything else. Longwear is finally lightweight—and radiant. High coverage is now super natural. Its breathable, fade-resistant formula is infused with Raspberry, Apple, and Watermelon extracts to help smooth and improve the look of your skin instantly, and over time for full-powered radiance. It wears longer, stays stronger, and looks better with each hour. Specialized skin-matching technology ensures your tr', 'foundation', 1950, 'C12', 'Normal'),
(100013, 'Face The Jungle! Face Palatte (Limited Edition Holiday 2020)', 'SEPHORA COLLECTION', 'Limited-edition face palette, consisting of a softly golden highlighter, two blushes in universal shades and a sun powder.', 'blush', 590, 'C13', 'Sale'),
(100014, 'Metallic Eye + Lip Crayon 3-Piece Set (Limited Edition)\r\n3 x 1.4g', 'FENTY BEAUTY', 'A limited-edition trio of creamy metallic crayons for both eyes and lips—featuring complementary chrome shades in a portable mirrored case for staying frosted on the fly.', 'eye shadow', 1450, 'C14', 'New'),
(100015, 'All-In-One Color Correcting Palette', 'STILA', 'An all-in-one color-correcting palette for neutralizing skin tone imperfections.', 'palette', 1600, 'C15-1', 'Popular'),
(100016, 'Talk Beauty to Me Holiday Set (Limited Edition)', 'BENEFIT COSMETICS', 'Time to speak chic like a Benefit gal with the value set of Benefit products.', 'gift set', 2150, 'C16', 'Sale'),
(100017, 'Meteorites Pearl Powder', 'GUERLAIN', 'Geurlain’s iconic handcrafted pearls have been reinvented with a boosted illuminating power. For the first time ever, Météorites’ Pearls incorporate Guerlain’s exclusive Stardust Technology, a spherical pigment contained within each pearl. This formulation diffracts light upon contact to envelop the skin in a halo of light. Each lightweight shade has a specific correcting action to offer women the ultimate in luminous skin.', 'powder', 2800, 'C17', 'Normal'),
(100018, 'BlitzTrance™ Lipstick', 'PAT MCGRATH LABS', 'A couture, cream lipstick that dazzles with provocative pigments and ultra-reflective pearls for a hi-fi glow.', 'lipstick', 1500, 'C18', 'Popular'),
(100019, 'Mini Nude Obsessions Kit (Limited Edition)', 'HUDA BEAUTY', 'A makeup kit featuring Huda Beauty\'s best-selling eyeshadow palettes and a matching mini liquid matte to suit every skin tone and eye colour.', 'gift set', 1100, 'C19-1', 'New'),
(100020, 'Dior Lip Glow', 'DIOR', 'The original must-have universal balm from Dior Backstage in a Glow finish along with two additional finishes: Matte and Holographic.', 'lipstick', 1390, 'C20', 'Popular'),
(100021, 'Powder Kiss Lipstick', 'MAC COSMETICS', 'A moisture-matte weightless lipstick from M·A·C that delivers a romantic blur of effortless soft focus colour, this weightless moisture-matte lipstick was developed to replicate a backstage technique: blending out edges of matte lipstick for a hazy effect. Its ground-breaking formula contains moisture-coated powder pigments that condition and hydrate lips. The result is the zero-shine look of a matte lipstick with the cushiony, lightweight feel of a balm. Fall for this all-new soft-touch, misty matte kiss of colour.', 'lipstick', 890, 'C21', 'Sale'),
(200001, 'The Water Cream', 'TATCHA', 'An anti-ageing cream that clarifies and refines skin with powerful Japanese botanicals.', 'cream', 2520, 'SC1', 'Normal'),
(200002, 'Abeille Royale Fortifying Lotion', 'GUERLAIN', 'Abeille Royale Fortifying Lotion', 'lotion', 3080, 'SC2', 'New'),
(200003, 'Vitamin Nectar Glow Juice Antioxidant Face Serum', 'FRESH', 'An energising antioxidant face serum that provides daily protection against damaging free radicals.\r\n\r\nAn energising antioxidant face serum that provides daily protection against damaging free radicals that can lead to a dull, lackluster complexion.', 'serum', 1200, 'SC3', 'Normal'),
(200004, 'Vinoperfect Radiance Serum Complexion Correcting', 'CAUDALIE', NULL, 'serum', 2190, 'SC4', 'New'),
(200005, 'Sugar Lip Hydrating Balm\r\n', 'FRESH\r\n', 'Fresh Sugar Lip Caramel Hydrating Balm locks in moisture for soft, supple, healthy-looking lips. The rich, cushiony formula coats lips with a protective and nourishing veil that smoothes and comforts on contact while delivering a natural-looking shine and addictive caramel flavor.', 'lip balm', 740, 'SC5-1', 'Normal'),
(200006, 'Glow Tonic', 'PIXI', 'A gently exfoliating toner for more even, brighter and clearer skin.', 'tonic', 590, 'SC6', 'Popular'),
(200007, 'Rose Face Mask (Limited Edition 2020)\r\n', 'FRESH\r\n', 'An instant hydrating mask with real rose petals suspended in a silky gel that gently soothes and tones with a plumping effect—in a limited-edition look designed by artist Jayde Cardinalli.', 'mask', 2450, 'SC7', 'New'),
(200008, 'Life Plankton™ Elixir', 'BIOTHERM', 'A soothing elixir hat defends and regenerates skin while supporting the natural cell renewal process.', 'serum', 2900, 'SC8', 'Normal'),
(200009, 'Youthpotion Rejuvenating Peptide Serum', 'GLAMGLOW', 'A powerhouse age-procrastination serum packed with supportive peptides and raspberry stem cells to help boost natural collagen production for firmer, plumper and more-younger-looking skin.', 'serum', 2500, 'SC9', 'Popular'),
(200010, 'MOISTURETRIP™ Omega-Rich Moisturizer', 'GLAMGLOW', 'A lightweight moisturizer with omega-rich hemp seed oil to calm, soothe, and relieve visible redness with lasting hydration.', 'Moisturizer', 1930, 'SC10', 'Sale'),
(200011, 'Dr. Andrew Weil for Origins™ Mega-Mushroom Relief & Resilience Soothing Treatment Lotion', 'ORIGINS\r\n', 'This lightweight hydrating lotion instantly calms skin while visibly reducing redness and sensitivity. Great for all skin types including sensitive skin, it is formulated with narcissus lily bulbs which optimize skin\'s defenses to help prevent potential future damage.', 'lotion', 1800, 'SC11', 'Normal'),
(200012, 'Soy Face Cleanser', 'FRESH', 'A bestselling, do-it-all cleanser for all skin types that instantly removes makeup and dirt without drying the skin', 'Cleanser', 2890, 'SC12', 'New'),
(200013, 'More Than Moisture Set', 'CLINIQUE', 'Treat your skin with long-lasting merriness and hydration with the set of Moisture Surge products.', 'Moisture', 1900, 'SC13', 'Normal'),
(200014, 'Hangover Good in Bed Ultra- Hydrating Replenishing Serum', 'TOO FACED', 'Drench skin with moisture day and night with this super-charged replenishing, hydrating serum that works in and out of bed to deliver the ultimate lit-from-within, healthy glow.', ' Serum', 1400, 'SC14', 'Popular'),
(200015, 'DetoxifEYE', 'PIXI', 'A set of instantly de-puffing and reviving hydrogel eye patches', 'eye', 960, 'SC15', 'New'),
(200016, 'Cryo Rubber With Moisturizing Hyaluronic Acic Moisturizing Mask', 'DR. JART+', 'A 2-step skincare kit with cooling rubber mask and moisturizing hyaluronic acid ampoule that retains moisture all day long.', 'mask', 420, 'SC16', 'Sale'),
(200017, 'Lotus Youth Preserve Dream Face Cream', 'FRESH', 'A lightweight whipped antioxidant night cream that helps detoxify while minimizing signs of aging.', 'cream', 2250, 'SC17', 'Normal'),
(200018, 'NightBright™ Skincare Duo Set', 'DRUNK ELEPHANT', 'A dreamy duo that works while you sleep to refine skin texture and tone for a youthful glow.', 'serum', 990, 'SC18', 'Sale'),
(200019, 'Purity Made Simple One-Step Facial Cleanser', 'PHILOSOPHY', 'Our award-winning daily facial skin cleanser is formulated to gently cleanse, tone and melt away all face and eye makeup in one simple step, while lightly hydrating the skin.', ' Cleanser', 950, 'SC19', 'New'),
(200020, 'Vitamin Nectar Moisture Glow Face Cream\r\n50ml', 'FRESH', 'Fresh Vitamin Nectar  Moisture Glow Face Cream with a vitamin fruit complex  is a revitalizing universal moisturizer that awakens skin for an incredibly vibrant, healthy-looking glow.', 'cream', 1980, 'SC20', 'Popular'),
(300001, '\r\nSauvage Eau De Parfum\r\n60ml\r\n', 'DIOR\r\n', 'The powerful freshness of Sauvage exudes new sensual and mysterious facets, amply renewing itself with the signature of an ingenious composition. Calabrian bergamot, as juicy and spirited as ever, invites new spicy notes to add fullness and sensuality, as the woody ambery trail of Ambroxan® is wrapped in the smoky accents of Papua New Guinean vanilla absolute for greater virility. François Demachy, Dior Perfumer-Creator, drew inspiration from the desert in the magical hour of twilight. Mixed with the coolness of the night, the bu', 'EDP', 4900, 'PF1', 'Normal'),
(300002, 'Kayali Elixir|11 - Exclusive For Sephora Online\r\n100ml\r\n', 'HUDA BEAUTY', 'An ultra-addictive scent, ELIXIR | 11 opens with sweet notes of red apple and rose petal essence, before revealing a floral heart of rose centifolia and uplifting touches of Jasmine sambac from India. Adding depth to the romantic fragrance, warm woody notes of Indonesian patchouli and velvety amber are enveloped by accents of vanilla, leaving behind a long-lasting trail.', 'EDP', 3300, 'PF2', 'Sale'),
(300003, 'Miss Dior Absolutely Blooming Eau De Parfum', 'DIOR', 'Bright and colourful, Miss Dior Absolutely Blooming is a floral delight you return to over and over. Its top notes of tangy Red Berry are joyful and striking. At its heart, a sublime duet of Grasse Roses and Damascus Roses embraces a sensuous Peony accord. This infinite blooming of fresh flowers is comforted in a base of White Musk notes. A positive and joyful harmony for a playful and irresistible Miss Dior.', 'EDP', 2150, 'PF3', 'Sale'),
(300004, 'Signature Eau De Parfum', 'CHLOÉ', 'Chloé Signature Eau de Parfum is a soft, feminine fragrance that features notes of rose, lychee, freesia and pink peony.', 'EDP', 4250, 'PF4', 'Popular'),
(300005, '\r\nBright Crystal Absolu EDP', 'VERSACE', 'A beautifully fresh, fruity and floral scent that has the bright top notes of juicy pomegranate, yuzu, and crisp water that transition to the inviting notes of magnificent magnolia and peony. The fragrance then trails to the sensual base notes of plants, musk, and rich red woods to provide a touch of soothing warmth.', 'EDP', 2500, 'PF5-1', 'Sale'),
(300006, 'Daisy Love Eau So Sweet', 'MARC JACOBS FRAGRANCE', 'An Eau de Toilette that captures the addictive and irresistible spirit of Daisy Love with an unexpected sweet freshness.', 'EDT', 3750, 'PF6', 'New'),
(300007, 'Miss Dior Eau De Parfum', 'DIOR', 'And you, what would you do for love? This Eau de Parfum is a floral declaration of love. In the heart of the fragrance, the fresh, sensual beauty of the Grasse rose combines with the boldness of Damascus rose. They are woven with Calabrian bergamot, vivid rosewood from French Guiana, and pink pepper from Réunion Island.\r\n\r\n\"It had to burst like that feeling of falling head over heels. A declaration of love, to love.\"—François Demachy, Dior Perfumer-Creator', 'EDP', 6600, 'PF7-1', 'Popular'),
(300008, 'Bloom Profumo Di Fiori Eau De Parfum', 'GUCCI', 'Enter the garden of dreams with the new Gucci Bloom Profumo di Fiori, dedicated to the women flourishing in an expressive and individual way. A natural green scent, it explores the rich floral quality and creamy depth of Tuberose.', 'EDP', 5400, 'PF8', 'Sale'),
(300009, 'Cool Water Intense For Him Eau De Parfum', 'DAVIDOFF', 'Discover Cool Water Intense, Davidoff, Eau de Parfum. A new take on Cool Water freshness with an ethically sourced ingredient, the handpicked green mandarin from Brazil. The scent unfolds into oriental notes of coconut water blended with the sensuality of amber accord. Your ultimate call of freshness, hedonism and seduction.', 'EDP', 3700, 'PF9', 'New'),
(300010, 'Toy Boy Eau De Parfum\r\n', 'MOSCHINO\r\n', 'Toy Boy, the new iconic men’s fragrance by Moschino. Toy Boy is the new exclusive fragrance by Moschino that reinterprets elegance with a touch of irony. It speaks to a unique, dynamic, enthusiastic and passionate man, but one who is not afraid to reveal his more tender and playful side. Toy Boy is an exciting play of endless codes seeking out re-evaluation and liberation. An intense kiss that reflects the energy and strength of the modern Moschino man but that also dissolves when it encounters his tender embrace.', 'EDP', 3200, 'PF10', 'Normal'),
(300011, 'JOY by Dior Eau de Parfum Intense', 'DIOR', 'An explosive Eau de Parfum Intense. A fragrance of floral fireworks, a concentration of joy.', 'EDT', 6800, 'PF11', 'Sale'),
(300012, 'Perfect Eau De Parfum', 'MARC JACOBS FRAGRANCE', 'A comforting floral scent that celebrates optimism, self-acceptance and originality.', 'EDP', 5250, 'PF12', 'New'),
(300013, 'Candy Florale EDT', 'PRADA', 'Candy declares her love for flowers. She takes on a new flirtatious game, where sensuality is pushed to the fullest.', 'EDT', 4950, 'PF13', 'Popular'),
(300014, 'Luna Rossa Black EDP', 'PRADA', 'A bottle of Prada Luna Rossa Black, an urban and exciting scent.', 'EDP', 3400, 'PF14', 'Normal'),
(300015, 'Polo Red Rush Edt', 'RALPH LAUREN', 'The new Polo Red Rush delivers an instant rush of freshness and energy. This energizing mix is driven by red mandarin, boosted with fresh mint, and finished with cedarwood. It demands you to seize the moment and feel the rush of passion, energy, and freedom.', 'EDT', 3500, 'PF15', 'Sale'),
(300016, 'Dahlia Divin Eau De Parfum', 'GIVENCHY', 'Dahlia Divin is a lush Floral Woody Eau de parfum with sweet top notes.The discovery of the fragrance continues with a great classical white flowers bouquet to finish with a very elegant dry woods signature. Like a Haute Couture gown, this golden fragrance enrobes you in a warm, radiant sensuality and unveils the divine within you.', 'EDP', 4390, 'PF16', 'New'),
(300017, 'Guilty Eau de Toilette', 'GUCCI', 'Gucci Guilty Eau de Toilette for Her is defined by a signature Fougère accord of geranium, commonly used in men’s scents. Intimate and magical Lilac flower laced with Amber radiates warmth and grace with a lasting impression.', 'EDT', 4050, 'PF17', 'Popular'),
(300018, 'Omnia Pink Sapphire EDT', 'BVLGARI\r\n', 'Omnia Pink Sapphire is an effervescent and whimsical scent, exuding the same sunny vibe as its namesake color. It opens with the fusing and fizzy of sparkling citrus and pink pepper notes, inviting you to delight in unencumbered joy. The creamy floral heart of the fragrance comes from the delivate velvety frangipani and wild tiara flower. For the woman who prefers her pink luxe, from fuchsia gems to rose champagne, Omnia Pink Sapphire bottles the thrilling, unstoppable energy of the hue in a scent that\'s fresh, sparkling and eleg', 'EDT', 3300, 'PF18', 'New'),
(300019, 'Candy Sugarpop Eau De Parfum', 'PRADA', 'Prada Candy Sugar Pop takes the addictive energy of the Prada Candy family and dips it into smooth, sparkling green citrus. More crisp than sweet, Prada Candy Sugar Pop is soaked in irony. Delicate notes of peach and vanilla mingle with shiny apple and top notes of vert de bergamote and green citrus, comprising an unexpected scent story. A sweet first impression cut with an ironic twist, Prada Candy Sugar Pop leaves the room on a high note.', 'EDP', 5500, 'PF19', 'Normal'),
(300020, 'Spirit Of The Brave Edt', 'DIESEL', 'Fragrance Spirit Of The Brave cologne for Men by Diesel was released in 2019.\r\nWho Is It Best For? Well it is an aroma highlighted by a bouquet of fragrant aromatic, bitter and green scented tones that will bring a natural, fresh and sensual perfumed sensation. Examining it closer once applied you will notice a lingering quality of softer fragranced balsamic, woody and fresh spicy hints that hide an essence of clearing, warm and elegant feelings.', 'EDT', 3300, 'PF20', 'Sale'),
(400001, 'Australian Pink Clay - Smoothing Body Sand', 'SAND & SKY', 'A body sand scrub that packs a punch with purifying Australian Pink Clay.', ' scrub', 1700, 'BB1', 'Popular'),
(400002, 'Exfoliating Body Granita', 'SEPHORA COLLECTION', 'Pamper your skin with the SEPHORA COLLECTION body scrubs with a fantastic grainy texture! A body scrub to discover in 5 scents, the desire to do more, and provide for wonderful little moments of happiness.', ' scrubs ', 430, 'BB2', 'Sale'),
(400003, 'Coconut Body Milk', 'KOPARI BEAUTY', 'It\'s no secret that coconut oil is our beauty weapon of choice. So when we learned this body milk was made from the good stuff, we were immediately hooked. Formulated with coconuts sourced from the Philippines, this coconut body lotion will quench skin\'s thirst all day long.', 'body milk', 1280, 'BB3', 'Normal'),
(400004, 'Pure Plant Body Oil', 'TRILOGY', 'A repairing and smoothing certified natural body oil for all over hydration and nourishment. With rosehip to repair and hydrate, sweet almond to stabilise the skin’s natural pH and apricot to soothe inflammation, this pure plant oil blend helps to improve stretch marks and scarring.\r\n\r\nA safe, natural option for use throughout pregnancy, it is also fragrance-free so ideal for sensitive skin and suitable for the whole family.', 'body oil', 1100, 'BB4', 'New'),
(400005, 'Amazing Grace Ballet Rose Shower Gel', 'PHILOSOPHY', 'Introducing Amazing Grace Ballet Rose, inspired by the delicate scent of pink rose petals opening at first bloom and the beautiful femininity of the bestselling Amazing Grace fragrance. This captivating new scent captures the quiet strength of a ballerina in a heart of delicate rose and peony, which are layered with sparkling lychee and finished with woods and sheer ballet pink musk.', 'Shower Gel', 1300, 'BB5', 'Popular'),
(400006, 'Wild Wishes Large Body Pouch', 'SEPHORA COLLECTION', 'Limited-edition Cotton Flower body care kit in reusable toiletries ', 'body care', 760, 'BB6', 'New'),
(400007, 'Coco Rose - Coconut Oil Body Polish', 'HERBIVORE BOTANICALS', 'Coco Rose Coconut Oil Body Polish is a highly moisturising and gently exfoliating blend of virgin coconut oil and delicately floral Moroccan rose absolute.', 'body oil', 1670, 'BB7', 'Sale'),
(400008, 'The Gold Mask™ Hand Revitalizing\r\n', 'STARSKIN\r\n', 'The Gold Mask™ foil gloves contain two layers - an inner layer soaked in a Bulgarian Rose based formula enriched with pure Shea Butter and Rose Hip Oil, and an outer protective foil layer which creates an intense warming effect to maximize absorption.', 'Mask', 690, 'BB8', 'New'),
(400009, 'Wild Wishes Hand Wash ', 'SEPHORA COLLECTION', 'Our Sephora Collection Cotton Flower cream handwash has had a Christmas makeover, with a new, totally wild design', 'Hand Wash ', 230, 'BB9', 'Normal'),
(400010, 'Oh My Bod! SPF50 Body Sunscreen', 'EVERYDAY HUMANS', 'A texturally superior SPF50 moisturizing body lotion that provides lightweight UVA/UVB protection while being sweat and water resistant.', 'Sunscreen', 690, 'BB10', 'Sale'),
(400011, 'Amazing Grace Set ', 'PHILOSOPHY', 'Amazing Grace best selling set:\r\n2 oz. perfume sizes, shower gel and body lotion in 240 ml size perfect for home and away and wrapped for presenting.', 'body lotion', 3290, 'BB11', 'Popular'),
(400012, 'Scrub Squad Kit', 'FRANK BODY', 'Get your bod in tip top condition whether you\'re at home or on holiday! This Travel Set contains 4 must-have mini scrubs in Original, Coconut, Cacao and Peppermint.', 'scrubs', 1890, 'BB12', 'New'),
(400013, 'Botanical Body Wash\r\n', 'TRILOGY\r\n', 'A gentle gel body wash to deliver exceptionally fresh, clean skin. Enjoy the crisp, relaxing, aroma-therapeutic fragrance while non-drying cleansers gently refresh the skin to leave you ready for action', ' Body Wash', 850, 'BB13', 'Popular'),
(400014, '100% Mineral Sunscreen Mist with Marigold Extract Broad Spectrum SPF 30', 'SUPERGOOP!', 'This 100 percent mineral, lightweight zinc formula sprays on white and dries quickly to a sheer, dry-touch finish on all skin tones. Marigold, safflower, and sunflower antioxidants defend against infrared and UV-induced free radical damage while aloe vera soothes the skin for feel-good protection, so you can have your fun in the sun.', 'Sunscreen ', 1300, 'BB14', 'Normal'),
(400015, 'Hydrating Body Cream', 'FRANK BODY', 'A body cream', 'Body Cream', 1000, 'BB15', 'Normal'),
(500001, 'Luna 3 For Sensitive Skin', 'FOREO\r\n', 'A soft skincare device featuring soft silicone touchpoints and T-Sonic technology to provide deep cleansing and diminish visible signs of ageing.', 'skincare device', 8900, 'BT1', 'Popular'),
(500002, 'Luna 3 For Combination Skin', 'FOREO\r\n', 'A soft skincare device featuring soft silicone touchpoints and T-Sonic technology to provide deep cleansing and diminish visible signs of ageing.', 'skincare device', 8900, 'BT2', 'Sale'),
(500003, 'Beautyblender Pro', 'BEAUTYBLENDER\r\n', 'Beautyblender® Pro is the perfect application method for darker-toned products that would be difficult to rinse clean from a lighter colored applicator. Use with complexion products, long-wear makeup, and self-tanners for flawless results.', 'Sponges', 825, 'BT3', 'New'),
(500004, 'Rosie Posie Blender Essentials Makeup Sponges Set -', 'BEAUTYBLENDER', 'A limited-edition trio of floral-inspired Beautyblender makeup sponges and the best-selling Blendercleanser in a new floral scent.', 'Sponges', 1980, 'BT4', 'Popular'),
(500005, 'Merry Metals Brush Set', 'TARTE', 'Brush up on your makeup skills with this set of full-size rose-gold eye & cheek brushes. It includes every brush you need for a full face!', 'Brush Set', 1400, 'BT5', 'Sale'),
(500006, 'Rose Golden Luxury Set\r\n8 rose golden brushes + 1 brown Large Brush Clutch', 'ZOEVA', 'The Rose Golden Luxury Set is a divine collection of makeup brushes for the face and eyes. As an accent piece, each brush features a lovely rose gold ferrule in a sturdy matte handle. This collection is also crafted with high quality bristle fibres that ensure precise product placement and excellent coverage.\r\n\r\nThe following items are included in the set: - 106 Powder brush - 102 Silk Finish brush - 110 Face Shape brush - 127 Luxe Sheer Cheek brush - 142 Concealer Buffer - 227 Soft Definer brush - 231 Petit Crease brush - 317 Wi', 'brushes', 3600, 'BT6', 'Normal'),
(500007, 'Flawless Star Brush', 'IT COSMETICS', 'A limited-edition star-shaped brush.', 'Brush', 1100, 'BT7', 'New'),
(500008, 'Eye Workout Set', 'SKIN GYM', 'The Rose Quartz Roller Eye Mini Roller and Skin Camp Eye Gel Mask is the perfect combination to give you the eye workout you need', 'Roller', 980, 'BT8', 'Popular'),
(500009, 'Facial Roller', 'HERBIVORE BOTANICALS', 'A roller that supports lymphatic drainage to reduce the appearance of puffiness, and wrinkles.', 'Facial Roller', 1390, 'BT9-1', 'Sale'),
(500010, 'Precision Makeup Sponge 100', 'FENTY BEAUTY', 'A 3-sided, latex-free makeup sponge perfect for applying and blending all formulas.', ' Sponge ', 690, 'BT10', 'Normal'),
(500011, 'Slip The Midnight Collection Skinnies', 'SLIP', 'A scrunchie set designed to avoid hair creases.', 'scrunchie', 1440, 'BT11', 'Popular'),
(500012, 'Eyelash Curler', 'COSLUXE', 'A luxury eyelash curler.', 'Eyelash Curler', 290, 'BT12', 'New'),
(500013, 'Wild Wishes Mini Brush Set ', 'SEPHORA COLLECTION', 'Limited-edition kit comprising 3 incredibly soft mini make-up brushes for your eyes and complexion. Ready to take on your travels in their special sparkling travel pouch!', 'Brush Set ', 740, 'BT13', 'Normal'),
(500014, 'Rose Golden Complete Eye Set', 'ZOEVA', 'The Pink Elements Complete Eye Set features 12 finely crafted eye brushes for professional makeup application. It is made with high quality bristle fibres that are attached to feminine pink handles on masculine, gunmetal gray ferrules.\r\n\r\nThe following items are included in the set: - 142 Concealer Buffer - 224 Luxe Defined Crease brush - 226 Smudger brush - 227 Luxe Soft Definer brush - 228 Crease brush - 230 Luxe Pencil brush - 231 Luxe Petit Crease brush - 234 Luxe Smoky Shader brush - 237 Detail Shader brush - 315 Fine Liner ', 'Brush Set ', 3600, 'BT14', 'Sale'),
(500016, 'Basic Eyes Kit\r\n', 'SIGMA BEAUTY', 'The Basic Eyes Kit contains seven professional quality brushes for the eyes. Perfect for applying, shading and blending products, this kit is ideal for all over eye makeup application. Plus, a free two-year warranty!\r\n\r\nBrushes Include: -E05 - Eye Liner: Create smooth and even lines. Use with gel or liquid liners. -E30 - Pencil: Soften and smoke out lines. Soften pencil liners along the top and bottom lash lines, add shadow to line the eyes, or use to highlight inner corner of eyes. -E40 - Tapered Blending: Soft blended crease. U', 'brush set', 2750, 'BT16', 'New'),
(500017, 'Classic Hair Brush ', 'ABYSSIAN', 'This professional hair brush is carved from natural coloured Schima wood engraved with the distinctive Abyssian pattern.', 'Hair Brush ', 800, 'BT17', 'Popular'),
(500018, 'Smoky Eye Brush Set', 'SEPHORA COLLECTION', 'A set of 4 must-have brushes for an easy-to-apply smoky effect', 'brush set', 790, 'BT18', 'New'),
(500019, 'ISSA 2', 'FOREO', 'The world’s first silicone sonic toothbrush.', 'toothbrush', 6000, 'BT19-1', 'Normal');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `STA_ID` bigint(20) UNSIGNED NOT NULL,
  `STA_NAME` varchar(30) DEFAULT NULL,
  `STA_CONTACT` varchar(50) DEFAULT NULL,
  `STA_USERNAME` varchar(30) NOT NULL,
  `STA_PASSWD` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`STA_ID`, `STA_NAME`, `STA_CONTACT`, `STA_USERNAME`, `STA_PASSWD`) VALUES
(1, 'admin jaa', '+66895478855', 'admin1', 'addmin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CART_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CUS_ID`);

--
-- Indexes for table `orderr`
--
ALTER TABLE `orderr`
  ADD PRIMARY KEY (`ORD_ID`);

--
-- Indexes for table `processs`
--
ALTER TABLE `processs`
  ADD PRIMARY KEY (`PROC_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PROD_ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`STA_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `CART_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CUS_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orderr`
--
ALTER TABLE `orderr`
  MODIFY `ORD_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `processs`
--
ALTER TABLE `processs`
  MODIFY `PROC_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `PROD_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=500020;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `STA_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
