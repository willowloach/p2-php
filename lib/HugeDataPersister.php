<?php
require_once dirname(__FILE__) . '/KeyValuePersister.php';

// {{{ HugeDataPersister

/**
 * サイズの大きい文字列を圧縮して永続化する
 */
class HugeDataPersister extends KeyValuePersister
{
    // {{{ _encodeValue()

    /**
     * 値をgzip+Base64エンコードする
     *
     * @param string $value
     * @return string
     */
    protected function _encodeValue($value)
    {
        return base64_encode(gzdeflate($value, 6));
    }

    // }}}
    // {{{ _decodeValue()

    /**
     * 値をgzip+Base64デコードする
     *
     * @param string $value
     * @return string
     */
    protected function _decodeValue($value)
    {
        return gzinflate(base64_decode($value));
    }

    // }}}
}

// }}}

/*
 * Local Variables:
 * mode: php
 * coding: cp932
 * tab-width: 4
 * c-basic-offset: 4
 * indent-tabs-mode: nil
 * End:
 */
// vim: set syn=php fenc=cp932 ai et ts=4 sw=4 sts=4 fdm=marker:
