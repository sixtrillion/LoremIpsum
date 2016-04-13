<?php
/*
 * This file is part of the Badcow Lorem Ipsum Generator.
 *
 * (c) Samuel Williams <sam@badcow.co>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace sixtrillion\LoremIpsum;

class Generator
{
    /**
     * The mean word length of a sentence
     *
     * @var float
     */
    protected $sentenceMean = 24.460;

    /**
     * The standard deviation of words in a sentence
     *
     * @var float
     */
    protected $sentenceStDev = 5.080;

    /**
     * Mean number of sentences per paragraph
     *
     * @var float
     */
    protected $paragraphMean = 5.800;

    /**
     * The standard deviation of sentences in a paragraph
     *
     * @var float
     */
    protected $paragraphStDev = 1.930;

    /**
     * @var array
     */
    protected $words = array(
    'juggernaut', 'interstellar',  'universe',       'neon',
    'airbag',     'save',          'paranoid',       'android',
    'noise',      'ambition',      'consequence',    'vomit',
    'god',        'dust',          'screaming',      'networking',
    'voices',     'subterranean',  'holes',          'meaning',
    'uptight',    'homesick',      'alien',          'sleep',
    'choke',      'exit',          'breathe',        'down',
    'transport',  'disappointed',  'sentimental',    'drivel',
    'chemical',   'hysterical',    'useless',        'reaction',
    'crushed',    'emptiest',      'feelings',       'landing',
    'motorways',  'clinging',      'disappointing',  'karma',
    'police',     'buzzes',        'payroll',        'lost',
    'phew',       'arrest',        'fridge',         'maths',
    'fitter',     'happier',       'dreams',         'powerless',
    'frantic',    'empty',         'frozen',         'love',   
    'paranoia',   'productive',    'electioneering', 'we',
    'kills',      'you',           'one',            'the',
    'that',       'meet',          'prods',          'trust',
    'vote',       'forwards',      'backwards',      'stop',
    'nothing',    'somewhere',     'go',             'riot',
    'voodoo',     'economics',     'business',       'walls',
    'basement',   'off',           'light',          'cry',
    'out',        'skull',         'there',          'toys',
    'friends',    'die',           'loneliest',      'feeling',
    'way',        'up',            'mind',           'ice',
    'inside',     'a',             'safe',           'smell',
    'climbing',   'no',            'surprises',      'heart',
    'landfill',   'job',           'bruises',        'heal',
    'quiet',      'life',          'monoxide',       'silence',
    'silent',     'final',         'government',     'tired',
    'pretty',     'garden',        'care',           'us',
    'lucky',      'glorious',      'day',            'change',
    'state',      'aircrash',      'lake',           'superhero',
    'edge',       'standing',      'are',            'time',
    'i',          'me',            'name',           'him',
    'could',      'tourist',       'ghost',          'slow',
    'idiot',      'sparks',        'see',            'flowing',
    'barks',      'dog',           'else',           'know',
    'at',         'hey',           'going',          'ask',
    'sometimes',  'hell',          'second',         'piggy',
    'squealing',  'rain',          'height',         'yuppies',
    'panic',      'children',      'head',           'guess',
    'does',       'great',         'comfortable',    'sleeping',
    'desperate',  'chance',        'weakness',       'winter',
    'pig',        'car'
    );

    /**
     * Set an array of words. Removes existing words.
     *
     * @codeCoverageIgnore
     *
     * @param $words
     */
    public function setWords(array $words)
    {
        $this->words = $words;
    }

    /**
     * Add a single or array of multiple words to the generator.
     *
     * @codeCoverageIgnore
     *
     * @param string|array $words
     */
    public function addWords($words)
    {
        if (is_array($words)) {
            $this->words = array_merge($this->words, $words);

            return;
        }

        $this->words[] = $words;
    }

    /**
     * @codeCoverageIgnore
     *
     * @return array
     */
    public function getWords()
    {
        return $this->words;
    }

    /**
     * @codeCoverageIgnore
     *
     * @param float $paragraphMean
     */
    public function setParagraphMean($paragraphMean)
    {
        $this->paragraphMean = (float) $paragraphMean;
    }

    /**
     * @codeCoverageIgnore
     *
     * @return float
     */
    public function getParagraphMean()
    {
        return $this->paragraphMean;
    }

    /**
     * @codeCoverageIgnore
     *
     * @param float $paragraphStDev
     */
    public function setParagraphStDev($paragraphStDev)
    {
        $this->paragraphStDev = (float) $paragraphStDev;
    }

    /**
     * @codeCoverageIgnore
     *
     * @return float
     */
    public function getParagraphStDev()
    {
        return $this->paragraphStDev;
    }

    /**
     * @codeCoverageIgnore
     *
     * @param float $sentenceMean
     */
    public function setSentenceMean($sentenceMean)
    {
        $this->sentenceMean = (float) $sentenceMean;
    }

    /**
     * @codeCoverageIgnore
     *
     * @return float
     */
    public function getSentenceMean()
    {
        return $this->sentenceMean;
    }

    /**
     * @codeCoverageIgnore
     *
     * @param float $sentenceStDev
     */
    public function setSentenceStDev($sentenceStDev)
    {
        $this->sentenceStDev = (float) $sentenceStDev;
    }

    /**
     * @codeCoverageIgnore
     *
     * @return float
     */
    public function getSentenceStDev()
    {
        return $this->sentenceStDev;
    }

    /**
     * Get an array of random words from $words
     *
     * @param int $count
     * @return array
     */
    public function getRandomWords($count)
    {
        $words = array();

        for ($i = 0; $i < $count; $i++) {
            $word = $this->words[array_rand($this->words)];
            if ($i > 0 && $words[$i - 1] === $word) {
                $i--;
                continue;
            }

            $words[] = $word;
        }

        return $words;
    }

    /**
     * Get an array of sentences
     *
     * @param int $count
     * @return array
     */
    public function getSentences($count)
    {
        $sentences = array();

        for ($i = 0; $i < $count; $i++) {
            $wordCount = (int) Statistics::gauss_ms($this->sentenceMean, $this->sentenceStDev);
            $sentence = $this->getRandomWords($wordCount);
            $sentences[] = $this->toSentence($sentence);
        }

        return $sentences;
    }

    /**
     * Get an array of paragraphs
     *
     * @param $count
     * @return array
     */
    public function getParagraphs($count)
    {
        $paragraphs = array();

        for ($i = 0; $i < $count; $i++) {
            $number = Statistics::gauss_ms($this->paragraphMean, $this->paragraphStDev);
            $number = ($number < 1) ? 1 : $number;
            $sentences = $this->getSentences($number);
            $paragraphs[] = implode(' ', $sentences);
        }

        return $paragraphs;
    }

    /**
     * Inserts commas and periods in the given
     * word array and capitalises first letter.
     *
     * @param array $sentence
     * @return string
     */
    protected function toSentence(array $sentence)
    {
        $count = count($sentence);
        $sentence[$count - 1] = $sentence[$count - 1] . '.';
        $sentence[0] = ucfirst($sentence[0]);

        if ($count < 4) {
            return implode(' ', $sentence);
        }

        $commas = $this->numberOfCommas($count);

        for ($i = 1; $i <= $commas; $i++) {
            $index = (int) round($i * $count / ($commas + 1));

            if ($index < ($count - 1) && $index > 0) {
                $sentence[$index] = $sentence[$index] . ',';
            }
        }

        return implode(' ', $sentence);
    }

    /**
     * Determines the number of commas for a
     * sentence of the given length. Average and
     * standard deviation are determined superficially
     *
     * @param int $len
     * @return int
     */
    protected function numberOfCommas($len)
    {
        $avg = log($len, 6);
        $stdDev = $avg / 6.000;

        return (int) round(Statistics::gauss_ms($avg, $stdDev));
    }
}
