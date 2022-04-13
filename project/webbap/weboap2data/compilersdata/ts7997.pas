Program _10_14;
const
     m=55;
type
    Pupil = record
          surname:string;
          name:string;
          first_name:string;
          street:string;
          house:integer;
          flat:integer
    end;
var
   Pupils:array[1..m] of Pupil;
   name:string;
   n,i:integer;
   flag:boolean;
begin
     readln(name);
     readln(n);
     for i:=1 to n do
     begin
          readln(Pupils[i].surname);
          readln(Pupils[i].name);
          readln(Pupils[i].first_name);
          readln(Pupils[i].street);
          readln(Pupils[i].house);
          readln(Pupils[i].flat)
     end;
     flag:=false;
     for i:=1 to n do
         if Pupils[i].name=name then
         begin
              if flag then
                 writeln
              else
                  flag:=true;
              writeln(Pupils[i].surname);
              writeln(Pupils[i].name);
              writeln(Pupils[i].first_name);
              writeln(Pupils[i].street);
              writeln(Pupils[i].house);
              write(Pupils[i].flat)
         end
end.