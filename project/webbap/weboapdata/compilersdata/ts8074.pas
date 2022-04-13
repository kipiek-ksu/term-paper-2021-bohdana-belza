program p3;
var s: string; n,i: integer; b: boolean;
begin
readln(s);
n:=0;
b:= false;
for i:= 1 to length (s) do
if s[i]=',' then
begin
 if b= true then
 begin
    n:=n+1;
    b:=false;
 end;
end
else
if s[i] ='d' then b:= true;
if b= true then k:= k+1;
write(n);
end.