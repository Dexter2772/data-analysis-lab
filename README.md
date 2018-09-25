# Data Analysis Lab

## Discover / Requirements
### What data do we need? ###
The data we need is the one from https://www.census.gov/data/datasets/2017/demo/popest/counties-detail.html. Here I downloaded "Annual Estimates of the Resident Population for Selected Age Groups by Sex: April 1, 2010 to July 1, 2017" for the state of Hawaii.

### Who needs it ###
I needed this data to use for this lab.

### Why is it important? ###
It is important because this is the data I will use for this lab. It is important that this is accurate data so this lab will be beneficial to learn from.

### What are our goals? ###
My goal is to complete this lab using accurate data that will help me learn techniques to analyze data.

### What is the business value ###
There is no business value to this - it is for a lab in class.

## Collection Phase ##
I downloaded the CSV file from the previously stated website.

## Data Prep / Cleaning ##
### The data seems accurate and it was downloaded from a very credible site ###
### I did have to change the headings in the excel file because the ones it originally had were very long and unnecessarily complicated. ###

## Exploration/Planning ##
There was no missing data in my excel file. The only problem was the disparity between the counties in Hawaii.
1. Honolulu - 953,207 (Highest)
2. Kalawao - 90 (Lowest)
This will be difficult to graph and choose an accurate scale due to the range between the maximum and minimum population.

## Modeling/Algorithms ##
I used the JavaScript library D3.js to upload a CSV file and then made it into a bar graph. This graphs shows the population of each county in Hawaii.
