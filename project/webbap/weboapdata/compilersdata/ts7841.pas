Program porg;
Var a,b,c,r:integer
Begin
read(a);
read(b);
read(c);
if (abs(a-b)=abs(b-c)) 
or (abs(a-c)=abs(c-b))
or (abs(b-a)=abs(a-c))
then
begin
 write(r);
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
write(a,b,c);
end
else
begin
 write('No');
end;
end.