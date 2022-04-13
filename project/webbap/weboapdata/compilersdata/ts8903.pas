program p7;
const n=3;
procedure Hanoy(a,b,c:char;count:integer);
begin
if count>0 then
   begin
     Hanoy(a,c,b,count-1);
     writeln(a,' ',c);
     Hanoy(b,a,c,count-1);
   end;
end;
begin
Hanoy('1','2','3',n);
end.