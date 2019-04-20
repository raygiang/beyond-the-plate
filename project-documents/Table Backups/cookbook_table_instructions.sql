
-- --------------------------------------------------------

--
-- Table structure for table `instructions`
--

CREATE TABLE `instructions` (
  `id` int(6) NOT NULL,
  `recipe_id` int(10) NOT NULL,
  `details` varchar(200) NOT NULL,
  `step` int(2) NOT NULL,
  `prep_time` int(5) NOT NULL DEFAULT '0',
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `created_date` int(10) NOT NULL,
  `modified_date` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructions`
--

INSERT INTO `instructions` (`id`, `recipe_id`, `details`, `step`, `prep_time`, `is_deleted`, `created_date`, `modified_date`) VALUES
(1, 1554816158, 'Take all ingredients and ..', 1, 0, 0, 1555353753, 1555353753),
(2, 1554816158, 'Bake each waffle', 2, 10, 0, 1555353753, 1555353753),
(3, 1555359154, 'About 20 minutes before grilling, remove the steaks from the refrigerator and let sit, covered, at room temperature.', 1, 20, 0, 1555359154, 1555359154),
(4, 1555359154, 'Heat your grill to high. Brush the steaks on both sides with oil and season liberally with salt and pepper', 2, 0, 0, 1555359154, 1555359154),
(5, 1555359154, 'Mince the shallot and add to a small bowl. Pour the vinegar over the shallots and add a pinch of salt.', 3, 30, 0, 1555359154, 1555359154),
(6, 1554816159, 'Place bread on cookie sheet.', 1, 0, 0, 1555353758, 1555353758),
(7, 1554816159, 'Spread with your desired amount of butter.Place cheese on top of butter.Add ham or turkey.', 2, 0, 0, 1555353758, 1555353758),
(8, 1554816159, 'Broil until tops are bubbly and just beginning to toast.', 3, 7, 0, 1555353758, 1555353758),
(9, 1554816160, 'Preheat the oven to 450 degrees F.', 1, 0, 0, 1555353777, 1555353777),
(10, 1554816160, 'Season salmon with salt and pepper. Place salmon, skin side down, on a non-stick baking sheet or in a non-stick pan with an oven-proof handle. ', 2, 0, 0, 1555353777, 1555353777),
(11, 1554816160, 'Bake until salmon is cooked through.', 3, 20, 0, 1555353777, 1555353777),
(12, 1554816161, 'In a large cast iron skillet over medium high heat, add olive oil and butter, potatoes, garlic, thyme, rosemary and oregano', 1, 0, 0, 1555355417, 1555355417),
(13, 1554816161, 'Turn the skillet to high heat. Add the steaks', 2, 0, 0, 1555355417, 1555355417),
(15, 1554816161, 'Cook the steaks to desired doneness', 3, 20, 0, 1555355417, 1555355417),
(16, 1554816162, 'Preheat the oven to 375 degrees F. Butter muffin pans. Mix the flour, baking powder, salt, and sugar in a large bowl. Add the egg, milk, and butter, stirring only enough to dampen the flour', 1, 0, 0, 1555355679, 1555355679),
(17, 1554816162, ' Spoon into the muffin pans, filling each cup about two-thirds full.', 2, 0, 0, 1555355679, 1555355679),
(18, 1554816162, 'Bake each.', 3, 25, 0, 1555355679, 1555355679),
(21, 1554816163, 'Mash the avocado in a small bowl and season with salt and pepper.', 1, 0, 0, 1555355680, 1555355680),
(22, 1554816163, 'Heat a small nonstick skillet over low heat, spray with oil and gently crack the egg into the skillet. Cook to your preference. ', 2, 5, 0, 1555355680, 1555355680),
(23, 1554816163, 'Place mashed avocado over toast, top with egg, salt and pepper and hot sauce if desired!', 3, 0, 0, 1555355680, 1555355680),
(24, 1554816174, 'Preheat oven to 325 F degrees. ', 1, 0, 0, 1555356153, 1555356153),
(25, 1554816174, 'Add the graham crackers to a food processor and pulse a few times until crumbs form. Add the melted butter and pulse a few more times. ', 2, 0, 0, 1555356153, 1555356153),
(26, 1554816174, 'Beat the cream cheese, sugar, flour, and vanilla in a large bowl until smooth and there are no visible clumps. Mix in the sour cream.', 3, 0, 0, 1555356153, 1555356153),
(27, 1554816174, 'Place the springform pan into a larger roasting pan and fill the pan halfway with boiling water, make sure it doesn\'t go over the foil.', 4, 0, 0, 1555356153, 1555356153),
(28, 1554816174, 'Transfer the big roasting pan into the oven and bake.', 5, 60, 0, 1555356153, 1555356153),
(29, 1554816174, 'Top the cheesecake with the cherry pie filling. Slice and serve.', 6, 0, 0, 1555356153, 1555356153),
(30, 1554816175, 'Mango - peel, seed, and cut into chunks. Peel and chop banana.', 1, 0, 0, 1555356155, 1555356155),
(31, 1554816175, 'Place mango, banana, orange juice, and yogurt in a blender. Blend until smooth.\r\nServe in clear glasses, and drink with a bendy straw! ', 2, 5, 0, 1555356155, 1555356155),
(32, 1555430167, 'Prepare Tamarind Juice, soak 1/2 tablespoon tamarind in 3-tablespoons of hot water for 10-15 minutes, mash it with a spoon and strain it using a sieve and discard the solids.', 1, 15, 0, 1555430167, 1555430167),
(33, 1555430167, 'Add toor dal, turmeric powder and 1 cup water in 3-4 liters capacity steel or aluminum pressure cooker. ', 2, 0, 0, 1555430167, 1555430167),
(34, 1555430167, 'Add mixed vegetables in a small container, place it inside the pressure cooker and close the cooker lid. Pressure cook over medium flame for 3-4 whistles. ', 3, 0, 0, 1555430167, 1555430167),
(35, 1555430167, 'Turn off the flame and allow it to stand until pressure comes down naturally. Open the lid, remove the container of vegetables and mash the dal using spatula or immersion blender.', 4, 0, 0, 1555430167, 1555430167),
(36, 1555430167, 'Heat 1-tablespoon oil in a pan or kadai over medium flame. Add mustard seeds. When they start to splutter, add curry leaves, dry red chilies, asafoetida, and sautÃ© for 10-15 seconds.', 5, 0, 0, 1555430168, 1555430168),
(37, 1555430167, 'Add cooked and mashed dal, boiled vegetables, 1½ cups water and salt.', 6, 0, 0, 1555430168, 1555430168),
(38, 1555430167, 'Turn off the flame. Transfer spicy Sambar into a serving bowl and garnish with finely chopped coriander leaves.', 7, 0, 0, 1555430168, 1555430168);
