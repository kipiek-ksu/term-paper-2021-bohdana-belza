Program _11_14;
const
     m=100;
type
    Pupil=record
                surnamei:string[40];
                namei:string[40];
                first_namei:string[40];
                streeti:string[40];
                housei:word;
                flati:word;
    end;
    type Class=array[1..m] of Pupil;
    var
       A:Class;
       name:string[40];
       n,i:integer;
    begin
         readln(name);
         readln(n);
         for i:=1 to n do
         with A[i] do
         begin
              readln(surnamei);
              readln(namei);
              readln(first_namei);
              readln(streeti);
              readln(housei);
              readln(flati);
         end;
    for i:=1 to n do
        if A[i].name=name then
        with A[i] do
        begin
             writeln(surname);
             writeln(name);
             writeln(first_name);
             writeln(street);
             writeln(house);
             writeln(flat);
        end;
end.