program T9z11;
type student=record
     namei,surnamei,first_namei,streeti,teli:string;
     is_teli:byte; housei,flati:integer;
end;
var a:array[1..50]of student;
    i,n:integer;
begin
  readln(n);
for i:=1 to n do
   with a[i] do
   begin
     readln(surnamei);
     readln(namei);
     readln(first_namei);
     readln(streeti);
     readln(housei);
     readln(flati);
     readln(is_teli);
   if is_teli=1 then readln(teli);
   end;
for i:=1 to n do
  if a[i].is_teli=0 then
  with a[i] do
  begin
    writeln(surnamei);
    writeln(namei);
    writeln(first_namei);
    writeln(streeti);
    writeln(housei);
    writeln(flati);
  end;
end.