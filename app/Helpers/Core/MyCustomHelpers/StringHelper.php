<?php

/**
 * Sanitize non-ascii characters that were breaking communication with BulkSMS
 */
if (! function_exists('sanitize_incorrectly_formed_string')) {
    /**
     * @param $string
     *
     * @return bool|string|string[]|null
     */
    function sanitize_incorrectly_formed_string($string)
    {
        // exmaple:  Ú => U´,  á => a`
        $string    = Normalizer::normalize( $string, Normalizer::FORM_D );
        $string    = preg_replace( '@\pM@u'        , "",    $string );    // removes diacritics
        $string    = preg_replace( '@\x{00df}@u'    , "ss",    $string );    // maps German ß onto ss
        $string    = preg_replace( '@\x{00c6}@u'    , "AE",    $string );    // Æ => AE
        $string    = preg_replace( '@\x{00e6}@u'    , "ae",    $string );    // æ => ae
        $string    = preg_replace( '@\x{0132}@u'    , "IJ",    $string );    // ? => IJ
        $string    = preg_replace( '@\x{0133}@u'    , "ij",    $string );    // ? => ij
        $string    = preg_replace( '@\x{0152}@u'    , "OE",    $string );    // Œ => OE
        $string    = preg_replace( '@\x{0153}@u'    , "oe",    $string );    // œ => oe
        $string    = preg_replace( '@\x{00d0}@u'    , "D",    $string );    // Ð => D
        $string    = preg_replace( '@\x{0110}@u'    , "D",    $string );    // Ð => D
        $string    = preg_replace( '@\x{00f0}@u'    , "d",    $string );    // ð => d
        $string    = preg_replace( '@\x{0111}@u'    , "d",    $string );    // d => d
        $string    = preg_replace( '@\x{0126}@u'    , "H",    $string );    // H => H
        $string    = preg_replace( '@\x{0127}@u'    , "h",    $string );    // h => h
        $string    = preg_replace( '@\x{0131}@u'    , "i",    $string );    // i => i
        $string    = preg_replace( '@\x{0138}@u'    , "k",    $string );    // ? => k
        $string    = preg_replace( '@\x{013f}@u'    , "L",    $string );    // ? => L
        $string    = preg_replace( '@\x{0141}@u'    , "L",    $string );    // L => L
        $string    = preg_replace( '@\x{0140}@u'    , "l",    $string );    // ? => l
        $string    = preg_replace( '@\x{0142}@u'    , "l",    $string );    // l => l
        $string    = preg_replace( '@\x{014a}@u'    , "N",    $string );    // ? => N
        $string    = preg_replace( '@\x{0149}@u'    , "n",    $string );    // ? => n
        $string    = preg_replace( '@\x{014b}@u'    , "n",    $string );    // ? => n
        $string    = preg_replace( '@\x{00d8}@u'    , "O",    $string );    // Ø => O
        $string    = preg_replace( '@\x{00f8}@u'    , "o",    $string );    // ø => o
        $string    = preg_replace( '@\x{017f}@u'    , "s",    $string );    // ? => s
        $string    = preg_replace( '@\x{00de}@u'    , "T",    $string );    // Þ => T
        $string    = preg_replace( '@\x{0166}@u'    , "T",    $string );    // T => T
        $string    = preg_replace( '@\x{00fe}@u'    , "t",    $string );    // þ => t
        $string    = preg_replace( '@\x{0167}@u'    , "t",    $string );    // t => t

        // remove all non-ASCii characters
        $string    = preg_replace( '@[^\0-\x80]@u'    , "",    $string );
        return $string;
    }
}


