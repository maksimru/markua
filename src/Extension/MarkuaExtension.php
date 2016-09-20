<?php
namespace League\Markua\Extension;

use League\CommonMark\Block\Parser as BlockParser;
use League\CommonMark\Extension\CommonMarkCoreExtension;
use League\Markua\Block\Parser as MarkuaBlockParser;
use League\Markua\Block\Renderer as MarkuaBlockRenderer;

class MarkuaExtension extends CommonMarkCoreExtension {

    public function getBlockParsers()
    {
        return array(
            // This order is important
            new BlockParser\IndentedCodeParser(),
            new BlockParser\LazyParagraphParser(),
            new BlockParser\BlockQuoteParser(),
            new MarkuaBlockParser\AsideParser(),
            new MarkuaBlockParser\IconBlockParser(),
            new BlockParser\ATXHeadingParser(),
            new BlockParser\FencedCodeParser(),
            new BlockParser\HtmlBlockParser(),
            new BlockParser\SetExtHeadingParser(),
            new BlockParser\ThematicBreakParser(),
            new BlockParser\ListParser(),
        );
    }

    public function getBlockRenderers()
    {
        $renderers = parent::getBlockRenderers();
        $renderers['League\Markua\Block\Element\Aside'] = new MarkuaBlockRenderer\AsideRenderer();
        $renderers['League\Markua\Block\Element\IconBlock'] = new MarkuaBlockRenderer\IconBlockRenderer();

        return $renderers;
    }
    
    public function getName() {
        return 'markua';
    }
}
