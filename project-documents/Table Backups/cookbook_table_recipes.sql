
-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_id` int(10) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `category` int(2) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `created_date` int(10) NOT NULL,
  `modified_date` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `name`, `user_id`, `description`, `category`, `is_deleted`, `created_date`, `modified_date`) VALUES
(1554816158, 'Puff Pastry Waffles', 4, 'Add puff pastry to the list of good things you can snackify in your waffle iron. Although they don\'t puff up as much as oven-baked puff pastry, they turn out crispy on the outside and tender on the inside, and they take only minutes to make. Serve hot or at room temperature with syrup, fruit, Nutella, fruit preserves, or nut butte', 5, 0, 1555353753, 1555353417),
(1554816159, 'Italian French Toast', 4, 'Packed with Italian flavours, this savoury French toast is a nice change from the usual. It makes an excellent brunch or lunch option.', 6, 0, 1555353758, 1555353758),
(1554816160, 'Oven-Baked Salmon', 4, 'Season salmon with salt and pepper. Place salmon, skin side down, on a non-stick baking sheet or in a non-stick pan with an oven-proof handle. Bake until salmon is cooked through, about 12 to 15 minutes. Serve with the Toasted Almond Parsley Salad and squash, if desired.', 7, 0, 1555353777, 1555353777),
(1554816161, 'Skillet Garlic Butter Herb Steak and Potatoes', 4, 'Skillet Garlic Butter Herb Steak and Potatoes is pan seared and cooked to perfection and topped with a garlic herb butter compound.  This is the best steak that I have ever had!!', 8, 0, 1555355417, 1555355417),
(1554816162, 'Best Ever Muffins', 4, 'Start with this basic recipe, and add one of several different ingredients for a variety of different muffins', 9, 0, 1555355679, 1555355679),
(1554816163, 'Avocado Toast', 4, 'Try my avocado sandwich for an exciting flavor twist on grilled cheese. The avocados make them extra creamy', 10, 0, 1555355680, 1555355680),
(1554816174, 'Perfect Cheesecake', 4, 'Perfect Cheesecake does not have to be intimidating! I have created the creamiest, smoothest, easiest cheesecake recipe from scratch that will always turn out perfect. PLUS I have some tips that will guarantee success', 11, 0, 1555356153, 1555356153),
(1554816175, 'Mango Smoothie Recipes', 4, 'This smoothie is so bright, cheerful, and delicious, it is like a blast of sunshine on even the most rainy, windy days!', 12, 0, 1555356155, 1555356155),
(1555359154, 'Perfectly Grilled Steak', 4, 'About 20 minutes before grilling, remove the steaks from the refrigerator and let sit, covered, at room temperature.', 8, 0, 1555359154, 1555359154),
(1555430167, 'Idli Sambhar', 5, 'Type of savoury rice cake with curry', 5, 0, 1555430167, 1555430167);
