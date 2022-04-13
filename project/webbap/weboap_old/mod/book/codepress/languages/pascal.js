/*
 * CodePress regular expressions for JavaScript syntax highlighting
 */

// JavaScript
Language.syntax = [
	{ input : /\"(.*?)(\"|<br>|<\/P>)/g, output : '<s>"$1$2</s>' }, // strings double quote
	{ input : /\'(.*?)(\'|<br>|<\/P>)/g, output : '<s>\'$1$2</s>' }, // strings single quote
	{ input : /\b(boolean|integer|real|char|Boolean|Integer|Real|Char|string|String)\b/g, output : '<b>$1</b>' }, // reserved words
	{ input : /\b(stdcall|pascal|const|to|finally|program|then|not|mod|shr|div|shl|set|library|packed|for|near|downto|exit|goto|on|of|or|array|unit|var|type|until|function|else|with|case|default|record|while|protected|procedure|and|cdecl|do|file|in|if|end|begin|repeat|nil|uses|xor|Stdcall|Pascal|Stored|Const|To|Finally|Program|Then|Not|Mod|Shr|Div|Shl|Set|Library|Packed|For|Near|Downto|Exit|Goto|On|Of|Or|Array|Unit|Var|Type|Until|Function|Else|With|Case|Default|Record|While|Procedure|And|Do|File|In|If|End|Begin|Repeat|Nil|Uses|Register|Xor|write|writeln|readln|read|Write|Writeln|Readln|Read)\b/g, output : '<u>$1</u>' }, // special words
	{ input : /([^:]|^)\/\/(.*?)(<br|<\/P)/g, output : '$1<i>//$2</i>$3' }, // comments //
	{ input : /\/\*(.*?)\*\//g, output : '<i>/*$1*/</i>' } // comments /* */
]

Language.snippets = [
	{ input : 'dw', output : 'document.write(\'$0\');' },
	{ input : 'getid', output : 'document.getElementById(\'$0\')' },
	{ input : 'fun', output : 'function $0()' },
	{ input : 'wri', output : 'write ($0);' },
	{ input : 're', output : 'read ($0);' },
	{ input : 'writel', output : 'writeln ($0);' },
	{ input : 'readl', output : 'readln ($0);' },
	{ input : 'prog', output : 'program $0' },
	{ input : 'rep', output : 'repeat \n\t $0 \n until' },
	{ input : 'un', output : 'until $0' },
	{ input : 'wh', output : 'while ($0) do \n\t\n' },
	{ input : 'Beg', output : 'Begin \n\t $0 \n End' },
	{ input : 'proc', output : 'procedure $0()' },
	{ input : 'func', output : 'function $0()' }
]

Language.complete = [
	{ input : '{',output : '{$0}' },
	{ input : '"', output : '"$0"' },
	{ input : '(', output : '\($0\)' },
	{ input : '[', output : '\[$0\]' },
	{ input : '/*', output : '/* \n\t$0\n */' }
]

Language.shortcuts = []
