program p3;
var s,st:string; ch: char; count:integer;
procedure k(s: string;ch: char;var st: string; var count: integer);
var i,z: integer;
begin
count:=0;
for i:= 1 to length(s)do
if s[i]=ch then
                begin
               delete(s,i,1);
               st:=s;
               count:=count+1;
                 end;
end;
begin
readln(s);
read(ch);
k(s,ch,st,count);
writeln(st,' ', count);
end.