program z10;
type Mn=set of 0..9; 
var s,a:longint;
    i,k:byte;
    b:Mn;
begin
readln(s);
b:=[];
while s>0 do
 begin
   a:=s mod 10;
   if not (a in b) then
     begin
       include(b,a);
       k:=k+1;
     end;
   s:=s div 10;
 end;
for i:=0 to 9 do 
if not (i in b ) then
write(i);
readln
end.