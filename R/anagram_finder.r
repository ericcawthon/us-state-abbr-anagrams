library(wfindr)
library(tidyverse)

strings <- read_csv('combinations8.csv')

matched_words <- data.frame(st_string = character(), word = character())

for(i in 1:nrow(strings)) {
  str <- tolower(strings$string[i])
  foundwords <- find_word(".{8,}", type = "scrabble", allow = str)
  if (is_empty(foundwords))
  {
    print(paste(i, ": Nothing found for ", str))
  }
  else
  {
    print(paste(i, ": GOT A HIT!! for ", str, " -- ", foundwords))
    for(i in 1:length(foundwords)) {
      newRow <- data.frame(st_string=str, word=foundwords[i])
      matched_words <- rbind(matched_words, newRow)
    }
  }
}

write.csv(matched_words, file="matched_words.csv")
