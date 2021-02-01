# us-state-abbr-anagrams

Using PHP and R to find eight-letter words that are anagrams of four adjacent US state postal abbreviations

## The Challenge

I heard a puzzle challenge on the radio to find a common eight-letter word spelled from the US state postal abbreviations of states that can be driven between. For more details, see the relevant [Sunday Puzzle](https://www.npr.org/2021/01/31/962412357/sunday-puzzle-game-of-words) page.

It sounded like an interested problem that could easily be sovled with computer science, so I decided to give it a try.

## Preparing Data

First, I pulled up a [simple map of the United States](https://www.google.com/maps/place/United+States) that showed state boundaries. I went state by state, creating a list of adjacent states and maing a list of their abbreviations.

The resulting file can be found [here](https://github.com/ericcawthon/us-state-abbr-anagrams/blob/main/Data/state_connections.xlsx).

## MySQL Setup

After that, I created a simple MySQL database for my PHP script to reference. The pairings data was loaded into the `connections` table. I also created a simple `states` table that contained the results of looking at the distinct values in the origin column of the `connections` table - both as a way to confirm I had entered pairings for all 48 states, and to create a list for my PHP script to work through. A `combinations8` table was created to store the results of my PHP script.

The details of that database can be found [here](https://github.com/ericcawthon/us-state-abbr-anagrams/blob/main/MySql/state_connections.sql).

## PHP Script to Find All Eight-Letter Combinations

I wrote a script in PHP which generated every possible four state combination based on the connections I had documented earlier. Nearly 3000 combinations were generated and written to the `combinations8` table.

My script can be found [here](https://github.com/ericcawthon/us-state-abbr-anagrams/blob/main/PHP/index.php).

## R Script to Find Anagrams

With all possible combinations in hand, I then needed to check them for anagrams that were common English word. I did not find a web API I was satisfied would be up for the task, but did find the [wfindr R package](https://github.com/idmn/wfindr) that seemed perfect for the job. I deduplicated the data in my `combinations8` table and exported the combinations to a CSV file for use with R. That file can be found [here](https://github.com/ericcawthon/us-state-abbr-anagrams/blob/main/Data/combinations8.csv).

My R script looped through each of the eight-letter state abbreviation combinations and fed each through the `find_word` function to find any eight-letter anagrams and saved any words it found to a dataframe which was exported as a CSV once the script finished runnig=ng.

My R script can be found [here](https://github.com/ericcawthon/us-state-abbr-anagrams/blob/main/R/anagram_finder.r).

The resulting CSV of eight-letter state abbreviation strings and the anagrams found within each can be found [here](https://github.com/ericcawthon/us-state-abbr-anagrams/blob/main/Data/matched_words.csv).

## Results

My scripts found 50 eight-letter anagrams out of the nearly 3000 possible four state combinations, of which only 10 words I would consider "common":

## Word | Four Adjacent States

------- | --------------------
Animator | IA > MO > TN > AR
Condemns | MN > DS > NE > CO ; NM > CO > NE > SD
Diamonds | ND > SD > IA > MO
Dioramas | SD > IA > MO > AR
Flagrant | FL > GA > TN > AR
Galavant | VA > TN > AL > GA
Moleskin | IL > MO > KS > NE
Nominate | NE > IA > MO > TN
Ornament | NE > MO > TN > AR
Ransomed | AR > MO > NE > SD

**Note: The above state combinations found the same words when checked in a different order, which is why the matched_words.csv is so much longer**

The complete list of anagrams can be found [here](<[here](https://github.com/ericcawthon/us-state-abbr-anagrams/blob/main/Data/distinct_anagrams.csv).>)
