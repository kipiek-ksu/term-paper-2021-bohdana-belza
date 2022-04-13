Program porg;
Var a,b,c:integer
Begin
readln(a);
readln(b);
readln(c);
if (abs(a-b)=abs(b-c)) 
or (abs(a-c)=abs(c-b))
or (abs(b-a)=abs(a-c))
then
begin
 write('Yes');
 if b < a then
   begin
     k:= a;
     a:= b;
     b:= k
   end;
 if c < a then
   begin
     k:= a;
     a:= c;
     c:= k
   end;
 if c < b then
   begin
     k:= b;
     b:= c;
     c:= k
   end;
write(a:5:2,b:5:2,c:5:2);
end
else
begin
 write('No!');
end;
end.