Program _11_14;
const
     m=100;
type
    Pupil=record
                surnamei:string[40];
                namei:string[40];
                first_namei:string[40];
                street:string[40];
                house:word;
                flat:word;
    end;
    type Class=array[1..m] of Pupil;
    var
       A:Class;
       name:string[40];
       n,i:integer;
    begin
         read(name);
         read(n);
         for i:=1 to n do
         with A[i] do
         begin
              read(surnamei);
              read(namei);
              read(first_namei);
              read(street);
              read(housei);
              read(flati);
         end;
    for i:=1 to n do
        if A[i].name=namei then
        with A[i] do
        begin
             write(surnamei);
             write(namei);
             write(first_namei);
             write(streeti);
             write(housei);
             write(flati);
        end;
end.