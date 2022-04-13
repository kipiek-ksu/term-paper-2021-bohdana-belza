program fd1;
var a:word;
    c,z:integer;
function maxF(ch:word;var m:integer):integer;
var b: integer;
begin
b:=ch mod 10;
if m<b then m:=b;
if ch=0 then maxF:=m
        else maxF:=maxF(ch div 10,m);
end;

begin
clrscr;
randomize;
  readln(a);
  c:=0;
  z:=maxF(a,c);

writeln(z);
readln;
end.