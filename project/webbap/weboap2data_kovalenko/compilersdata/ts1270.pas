program z29;
uses crt;
var a,o,b,p:real;
begin
clrscr;
readln(a,b);
p:=b;
if a>p then begin o:=a/5; write(o:0:2,' ',b:0:2);  end
else write(a:0:2,' ',p:0:2);
end.