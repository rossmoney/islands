Create a PHP application that will give a JSON output with the following structure:

{
    map: int[][],
    islands: int,
}

- `map` is a randomly generated 5x5 grid of 1s and 0s. 1s represent land and 0s represent water.
- `islands` is the number of islands in the map. An island is any area of land surrounded by water and is formed by connecting adjacent lands horizontally or vertically. You can assume that the map is surrounded by water.

Examples:

```json
{
    map: [
        [0,1,1,1,1],
        [0,0,1,0,1],
        [0,0,0,0,0],
        [0,1,0,0,0],
        [0,1,0,0,0],
    ],
    islands: 2,
}
```
```json
{
    map: [
        [1,0,1,1,0],
        [1,1,0,0,0],
        [1,1,0,1,0],
        [0,1,0,0,0],
        [1,1,0,0,0],
    ],
    islands: 3,
}
```

Although it may seem unnecessary for this project, you must use an existing open source PHP framework and you can make use of any dependencies which you think may help. You should comment your code with your thought process and reasoning.

You do not have to complete this - you don't need to spend more than two hours on this as we don't want to use up too much of your time on a throw away application. If you do run out of time or can't spare that much time, instead note how long you spent, any sticking points and what you would have done given more time. Likewise, if you do spend more time than mentioned, then please mention how long and your reasons for continuing.

Once you're done, you can zip your source files and email it and a summary of your experience to us via your recruiter.
